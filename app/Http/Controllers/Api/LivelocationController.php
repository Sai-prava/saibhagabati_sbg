<?php

namespace App\Http\Controllers\Api;

use App\Attendance;
use App\AttendanceModel;
use App\Classes\TrackingHelper;
use App\Http\Controllers\Controller;
use App\Settings;
use App\UserDevice;
use Exception;
use Illuminate\Http\Request;

class LivelocationController extends Controller
{
    public function liveLocationAjax()
    {
        try {
            $userDevices = UserDevice::whereDate('updated_at', '>=', now())
                ->with('user')
                ->get();
            // dd($userDevices);

            $todayAttendances = AttendanceModel::with('user.userDevice')
                ->whereDate('created_at', '>=', now())
                ->with('user')->with('user.userDevice')
                ->get();
            // dd( $todayAttendances );
            $response = [];

            foreach ($todayAttendances as $attendance) {

                /*  $response[] = [
                      'id' => $attendance->id,
                      'name' => $attendance->user->getFullName(),
                      'latitude' => $attendance->user->userDevice->latitude,
                      'longitude' => $attendance->user->userDevice->longitude,
                      'is_online' => $attendance->user->userDevice->is_online,
                      'is_gps_on' => $attendance->user->userDevice->is_gps_on,
                      'updated_at' => $attendance->user->userDevice->updated_at,
                  ];*/

                if ($attendance->user->userDevice == null) {
                    continue;
                }

                $settings = Settings::first();

                $status = 'offline';
                //  ? $status = 'online' : $status = 'offline';
                $trackingHelper = new TrackingHelper();
                if ($trackingHelper->isUserOnline($attendance->user->userDevice->updated_at)) {
                    $status = 'online';
                }

                $response[] = [
                    'id' => $attendance->user_id,
                    'name' => $attendance->user->getFullName(),
                    'latitude' => $attendance->user->userDevice->latitude,
                    'longitude' => $attendance->user->userDevice->longitude,
                    'status' => $status,
                    'updatedAt' => $attendance->user->userDevice->updated_at,
                    'type' => $settings->offline_check_time_type,
                    'time' => $settings->offline_check_time,
                ];
            }

            return response()->json($response);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
