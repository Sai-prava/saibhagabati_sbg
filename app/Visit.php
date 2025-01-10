<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    
    protected $table = 'visits';

    protected $fillable = [
        'client_id',
        'attendance_id',
        'remarks',
        'img_url',
        'latitude',
        'longitude',
        'address',
        'created_by_id',
        'updated_by_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }


    public function attendance()
    {
        return $this->belongsTo(Attendance::class, 'attendance_id');
    }
}
