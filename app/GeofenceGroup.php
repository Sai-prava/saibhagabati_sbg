<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeofenceGroup extends Model
{
    use HasFactory;
    protected $table = 'geofence_groups';

    protected $fillable = [
        'name',
        'description',
        'status',
        'created_by_id',
        'updated_by_id',
    ];

    // public function geofenceLocations()
    // {
    //     return $this->hasMany(GeofenceLocation::class);
    // }

    // public function geofenceVerifications()
    // {
    //     return $this->hasMany(GeofenceVerificationLog::class, 'user_id');
    // }
}
