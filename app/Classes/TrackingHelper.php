<?php

namespace App\Classes;

use App\Models\Settings;
use App\Settings as AppSettings;

class TrackingHelper
{
    public function __construct()
    {
    }

    public function isUserOnline($updatedAt): bool
    {

        $settings = AppSettings::first();
        $offlineCheckType = $settings->offline_check_time_type;
        $offlineCheckTime = $settings->offline_check_time;

        $isOnline = false;
        if ($offlineCheckType == 'minutes') {
            $isOnline = strtotime($updatedAt) > strtotime('-' . $offlineCheckTime . ' minutes');
        } else {
            $isOnline = strtotime($updatedAt) > strtotime('-' . $offlineCheckTime . ' seconds');
        }

        return $isOnline;
    }


    public function getFilteredData($trackings): array
    {

        if ($trackings->count() <= 0) {
            return [];
        }

        $finalTracking = [];

        $stillRemovedCount = 0;
        $inVehicleRemoveCount = 0;

        for ($i = 0; $i < $trackings->count(); $i++) {

            $tracking = $trackings[$i];

            //$previousTracking = $trackings[$i-1];

            if ($tracking->type == 'checked_in' || $tracking->type == 'checked_out') {

                $finalTracking[] = $tracking;
            }

            $lastRecord = $finalTracking[count($finalTracking) - 1];

            $distance = $this->GetDistance($lastRecord->latitude, $lastRecord->longitude, $tracking->latitude, $tracking->longitude);

            if ($distance < 0.5) {
                $stillRemovedCount++;
            } else if ($distance < 15 && $tracking->activity == 'ActivityType.IN_VEHICLE') {
                $inVehicleRemoveCount++;
            } else {
                $finalTracking[] = $tracking;
            }

        }

        //Take 24 items from final tracking array
        return array_slice($finalTracking, 0, 24);
    }

    function GetDistance($lat1, $lon1, $lat2, $lon2): float
    {
        $R = 6371; // Radius of the earth in km
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = $R * $c; // Distance in km
        return $d;
    }

    public function test(): string
    {
        return 'test';
    }
}
