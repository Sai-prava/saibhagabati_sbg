<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $table = 'sites';

    protected $fillable = [
        'name',
        'description',
        'latitude',
        'longitude',
        'radius',
        'address',
        'status',
        'is_attendance_enabled',
        'attendance_type',
        'client_id',
        'dynamic_qr_device_id',
        'geofence_group_id',
        'ip_address_group_id',
        'qr_code_group_id',
        'shift_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function dynamicQrDevice()
    {
        return $this->belongsTo(DynamicQrDevice::class);
    }

    public function geofenceGroup()
    {
        return $this->belongsTo(GeofenceGroup::class);
    }

    public function ipAddressGroup()
    {
        return $this->belongsTo(IpAddressGroup::class);
    }

    public function qrCodeGroup()
    {
        return $this->belongsTo(QrCodeGroup::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'site_id', 'id');
    }

    public function ipAddressVerifications()
    {
        return $this->hasMany(IpAddressVerificationLog::class, 'site_id', 'id');
    }

    public function geofenceVerifications()
    {
        return $this->hasMany(GeofenceVerificationLog::class, 'user_id');
    }

}
