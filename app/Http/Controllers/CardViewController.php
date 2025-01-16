<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\AttendanceModel;
use App\Classes\TrackingHelper;
use App\Http\Controllers\Controller;
use App\Team;
use App\User;
use App\UserDevice;
use App\Visit;
use Illuminate\Http\Request;

class CardViewController extends Controller
{
    public function cardView()
    {
        $teamsList = Team::where('status', '=', 'active')
            ->get();

        $attendances = AttendanceModel::whereDate('created_at', '=', now())
            ->get();

        $trackingHelper = new TrackingHelper();

        $users = User::where('status', '=', 'Active')
            ->where('team_id', '!=', null)
            ->where('shift_id', '!=', null)
            ->get();

        $userDevices = UserDevice::whereIn('user_id', $users->pluck('id'))
            ->get();

        $teams = [];
        foreach ($teamsList as $team) {

            $user = $users->where('team_id', '=', $team->id);

            $teamAttendances = $attendances->whereIn('user_id', $user->pluck('id'));

            $cardItems = [];

            foreach ($teamAttendances as $attendance) {

                $device = $userDevices
                    ->where('user_id', '=', $attendance->user_id)
                    ->first();

                if ($device == null) {
                    continue;
                }

                $isOnline = $trackingHelper->isUserOnline($device->updated_at);

                $visitsCount = Visit::where('attendance_id', '=', $attendance->id)
                    ->whereDate('created_at', '=', now())
                    ->count();
                    
                $cardItems[] = [
                    'id' => $attendance->user->id,
                    'name' => $attendance->user->user_name,
                    'phoneNumber' => $attendance->user->phone_number,
                    'batteryLevel' => $device->battery_percentage,
                    'isGpsOn' => $device->is_gps_on,
                    'isWifiOn' => $device->is_wifi_on,
                    'updatedAt' => $device->updated_at,
                    'isOnline' => $isOnline,
                    'teamId' => $attendance->user->team_id,
                    'teamName' => $team->name,
                    'attendanceInAt' => $attendance->check_in_time,
                    'attendanceOutAt' => $attendance->check_out_time ?? '',
                    'latitude' => $device->latitude,
                    'longitude' => $device->longitude,
                    'address' => $device->address,
                    'visitsCount' => $visitsCount,
                ];
            }

            $teams[] = [
                'id' => $team->id,
                'name' => $team->name,
                'totalEmployees' => $user->count(),
                'cardItems' => $cardItems,
            ];
        }

        return view('pages.card_view', compact('teams'));
    }
    public function cardViewAjax()
    {
        $teamsList = Team::where('status', '=', 'active')
            ->get();

        $attendances = AttendanceModel::whereDate('created_at', '=', now())
            ->get();

        $trackingHelper = new TrackingHelper();

        $users = User::where('status', '=', 'Active')
            ->where('team_id', '!=', null)
            ->where('shift_id', '!=', null)
            ->get();

        $userDevices = UserDevice::whereIn('user_id', $users->pluck('id'))
            ->get();

        $cardItems = [];
        foreach ($teamsList as $team) {

            $user = $users->where('team_id', '=', $team->id);

            $teamAttendances = $attendances->whereIn('user_id', $user->pluck('id'));

            foreach ($teamAttendances as $attendance) {

                $device = $userDevices
                    ->where('user_id', '=', $attendance->user_id)
                    ->first();

                if ($device == null) {
                    continue;
                }

                $isOnline = $trackingHelper->isUserOnline($device->updated_at);

                $visitsCount = Visit::where('attendance_id', '=', $attendance->id)
                    ->whereDate('created_at', '=', now())
                    ->count();

                $cardItems[] = [
                    'id' => $attendance->user->id,
                    'name' => $attendance->user->user_name,
                    'phoneNumber' => $attendance->user->phone_number,
                    'batteryLevel' => $device->battery_percentage,
                    'isGpsOn' => $device->is_gps_on,
                    'isWifiOn' => $device->is_wifi_on,
                    'updatedAt' => $device->updated_at->diffForHumans(),
                    'isOnline' => $isOnline,
                    'teamId' => $attendance->user->team_id,
                    'teamName' => $team->name,
                    'attendanceInAt' => $attendance->check_in_time,
                    'attendanceOutAt' => $attendance->check_out_time ?? 'N/A',
                    'latitude' => $device->latitude,
                    'longitude' => $device->longitude,
                    'address' => $device->address,
                    'visitsCount' => $visitsCount,
                ];
            }
        }

        return response()->json($cardItems);
    }
}
