<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;
    protected $table = 'trackings';

    protected $fillable = [
        'attendance_id',
        'latitude',
        'longitude',
        'altitude',
        'speed',
        'ip',
        'address',
        'is_mock',
        'is_gps_on',
        'is_wifi_on',
        'battery_percentage',
        'accuracy',
        'signal_strength',
        'activity',
        'image_url',
        'type',
        'is_offline',
        'bearing'
    ];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
}
