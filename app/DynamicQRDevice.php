<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicQRDevice extends Model
{
    use HasFactory;
    protected $table = 'dynamic_qr_devices';

    protected $fillable = [
        'name',
        'description',
        'unique_id',
        'pin',
        'qr_code_value',
        'token',
        'qr_last_updated_at',
        'qr_update_interval',
        'qr_expire_at',
        'status',
        'device_type',
        'created_by_id',
        'updated_by_id',
    ];
}
