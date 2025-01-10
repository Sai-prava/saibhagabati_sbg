<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
{
    use HasFactory;
    protected $table = 'user_devices';

    protected $fillable = [
        'user_id',
        'device_id',
        'device_type',
        'device_token',
        'brand',
        'board',
        'sdk_version',
        'model',
        'app_version',
        'battery_percentage',
        'is_online',
        'is_gps_on',
        'is_wifi_on',
        'is_mock',
        'signal_strength',
        'latitude',
        'longitude',
        'address',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
