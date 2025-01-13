<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\AttendanceModel;
use App\Classes\TrackingHelper;
use App\Classes\ViewHelper;
use App\Http\Controllers\Controller;
use App\Tracking;
use App\User;
use App\UserDevice;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function timeLine()
    {
        $viewHelper = new ViewHelper();
        $employees = $viewHelper->getEmployeeSelectLists();
        // dd($employees);
        // $employees = User::where('role',2)->get();
        return view('pages.time_line',compact('employees'));
    }

    public function getTimeLineAjax(Request $request)
    {
        // dd($request->user_id);
        $employeeId = $request->userId;
        // dd($employeeId);
        $date = date('Y-m-d H:i:s',strtotime($request->date));
        // dd($date);

        $trackingHelper = new TrackingHelper();

        $attendance = AttendanceModel::where('user_id', '=', $employeeId)
            ->where('created_at', '=', $date)
            ->with('user', 'trackings')
            ->first();
        // dd($attendance->trackings);

        $device = UserDevice::where('user_id', '=', $employeeId)
            ->with('user')
            ->first();
        // dd($device);

        if ($attendance == null) {
            return response()->json([
                'employeeName' => $device ? $device->user->user_name : 'N/A',
                'employeeId' => $device ? $device->user->id : 'N/A',
                'totalTrackedTime' => '00:00:00',
                'totalAttendanceTime' => '00:00:00',
                'deviceInfo' => $device ? $device->brand . ' ' . $device->model : 'N/A',
                'timeLineItems' => [],
            ]);
        }

        $totalKM = 0;

        $trackingItems = [];

        if ($attendance->trackings->count() > 0) {

            $checkIn = $attendance->trackings->first();
            $checkOut = $attendance->trackings->last();

            $now = now();

            $totalTrackedTime = '00:00:00';
            if ($checkOut->type == 'checked_out') {
                $totalTrackedTime = $checkIn->created_at->diff($checkOut->created_at)->format('%H:%I:%S');
            } else {
                $totalTrackedTime = $checkIn->created_at->diff($now)->format('%H:%I:%S');
            }

            $totalAttendanceTime = $totalTrackedTime;

            $trackings = Tracking::where('attendance_id', '=', $attendance->id)
                ->where('accuracy', '>', 20)
                ->distinct(['latitude', 'longitude', 'created_at'])
                ->get();

            $filteredTrackings = $trackingHelper->getFilteredData($trackings);

            $timeLineItems = [];

            for ($i = 0; $i < count($filteredTrackings); $i++) {

                $elapseTime = "0";

                $tracking = $filteredTrackings[$i];
                $nextTracking = null;
                if ($tracking->type == 'checked_in') {
                    if ($i < count($filteredTrackings) - 1 && count($filteredTrackings) != 1) {
                        $nextTracking = $filteredTrackings[$i + 1];
                        $elapseTime = $tracking->created_at->diff($nextTracking->created_at)->format('%H:%I:%S');
                    } else {
                        $elapseTime = '0';
                    }
                    $timeLineItems[] = [
                        'id' => $tracking->id,
                        'type' => 'checkIn',
                        'accuracy' => $tracking->accuracy,
                        'activity' => $tracking->activity,
                        'batteryPercentage' => $tracking->battery_percentage,
                        'isGPSOn' => $tracking->is_gps_on,
                        'isWifiOn' => $tracking->is_wifi_on,
                        'latitude' => $tracking->latitude,
                        'longitude' => $tracking->longitude,
                        'address' => $tracking->address,
                        'signalStrength' => $tracking->signal_strength,
                        'trackingType' => $tracking->type,
                        'startTime' => $tracking->created_at->format('h:i A'),
                        'endTime' => $nextTracking != null ? $nextTracking->created_at->format('h:i A') : $tracking->created_at->format('h:i A'),
                        'elapseTime' => $elapseTime,
                    ];
                    continue;
                }

                if ($tracking->type == 'checked_out') {


                    $elapseTime = $tracking->created_at->format('%H:%I:%S');

                    $timeLineItems[] = [
                        'id' => $tracking->id,
                        'type' => 'checkOut',
                        'accuracy' => $tracking->accuracy,
                        'activity' => $tracking->activity,
                        'batteryPercentage' => $tracking->battery_percentage,
                        'isGPSOn' => $tracking->is_gps_on,
                        'isWifiOn' => $tracking->is_wifi_on,
                        'latitude' => $tracking->latitude,
                        'longitude' => $tracking->longitude,
                        'address' => $tracking->address,
                        'signalStrength' => $tracking->signal_strength,
                        'trackingType' => $tracking->type,
                        'startTime' => $elapseTime,
                        'endTime' => $tracking->created_at->format('h:i A'),
                        'elapseTime' => $elapseTime,
                    ];
                    continue;
                }

                $nextTracking = null;

                if ($i + 1 < count($filteredTrackings)) {
                    $nextTracking = $filteredTrackings[$i + 1];
                    $elapseTime = $tracking->created_at->diff($nextTracking->created_at)->format('%H:%I:%S');
                } else {
                    $elapseTime = $tracking->created_at->format('%H:%I:%S');
                }

                switch ($tracking->activity) {
                    case 'ActivityType.STILL':
                        $timeLineItems[] = [
                            'id' => $tracking->id,
                            'type' => 'still',
                            'accuracy' => $tracking->accuracy ?? 0,
                            'activity' => $tracking->activity,
                            'batteryPercentage' => $tracking->battery_percentage,
                            'isGPSOn' => $tracking->is_gps_on,
                            'isWifiOn' => $tracking->is_wifi_on,
                            'latitude' => $tracking->latitude,
                            'longitude' => $tracking->longitude,
                            'address' => $tracking->address,
                            'signalStrength' => $tracking->signal_strength,
                            'trackingType' => $tracking->type,
                            'startTime' => $tracking->created_at->format('h:i A'),
                            'endTime' => $nextTracking != null ? $nextTracking->created_at->format('h:i A') : $tracking->created_at->format('h:i A'),
                            'elapseTime' => $elapseTime,
                        ];
                        break;
                    case 'ActivityType.WALKING':
                        $timeLineItems[] = [
                            'id' => $tracking->id,
                            'type' => 'walk',
                            'accuracy' => $tracking->accuracy ?? 0,
                            'activity' => $tracking->activity,
                            'batteryPercentage' => $tracking->battery_percentage,
                            'isGPSOn' => $tracking->is_gps_on,
                            'isWifiOn' => $tracking->is_wifi_on,
                            'latitude' => $tracking->latitude,
                            'longitude' => $tracking->longitude,
                            'address' => $tracking->address,
                            'signalStrength' => $tracking->signal_strength,
                            'trackingType' => $tracking->type,
                            'startTime' => $tracking->created_at->format('h:i A'),
                            'endTime' => $nextTracking->created_at->format('h:i A'),
                            'elapseTime' => $elapseTime,
                        ];
                        break;
                    default:

                        $distance = 0;
                        if ($i + 1 < count($filteredTrackings)) {
                            $nextTracking = $filteredTrackings[$i + 1];
                            $distance = $trackingHelper->GetDistance($tracking->latitude, $tracking->longitude, $nextTracking->latitude, $nextTracking->longitude);
                            $totalKM += $distance;
                        }


                        $timeLineItems[] = [
                            'id' => $tracking->id,
                            'type' => 'vehicle',
                            'accuracy' => $tracking->accuracy ?? 0,
                            'activity' => $tracking->activity,
                            'batteryPercentage' => $tracking->battery_percentage,
                            'isGPSOn' => $tracking->is_gps_on,
                            'isWifiOn' => $tracking->is_wifi_on,
                            'latitude' => $tracking->latitude,
                            'longitude' => $tracking->longitude,
                            'address' => $tracking->address,
                            'signalStrength' => $tracking->signal_strength,
                            'trackingType' => $tracking->type,
                            'startTime' => $tracking->created_at->format('h:i A'),
                            'endTime' => $nextTracking->created_at->format('h:i A'),
                            'elapseTime' => $elapseTime,
                            'distance' => $distance,
                        ];
                        break;
                }
            }

            $totalKM = round($totalKM, 2);

            $response = [
                'employeeId' => $attendance->user->id,
                'employeeName' => $attendance->user->user_name,
                'attendanceId' => $attendance->id,
                'totalTrackedTime' => $totalTrackedTime,
                'totalAttendanceTime' => $totalAttendanceTime,
                'deviceInfo' => $device->brand . ' ' . $device->model,
                'totalKM' => $totalKM,
                'timeLineItems' => $timeLineItems,
            ];

            return response()->json($response);
        } else {
            return response()->json("No");
        }
    }
    
    public function updateLocationAjax()
    {
        $trackingId = request('trackingId');
        $address = request('address');

        if ($trackingId == null || $address == null) {
            return response()->json('error');
        }

        $tracking = Tracking::find($trackingId);

        if ($tracking == null) {
            return response()->json('error');
        }

        $tracking->address = $address;
        $tracking->save();

        return response()->json('success');
    }
}
