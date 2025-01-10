<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeofenceVerificationLog extends Model
{
    use HasFactory;
    protected $table = 'geofence_verification_logs';

    protected $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'is_verified',
        'verified_at',
        'reason',
        'site_id',
        'geofence_group_id',
        'created_by_id',
        'updated_by_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function geofenceGroup()
    {
        return $this->belongsTo(GeofenceGroup::class);
    }
}
