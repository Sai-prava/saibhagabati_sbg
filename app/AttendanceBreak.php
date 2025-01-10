<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceBreak extends Model
{
    use HasFactory;

    protected $table = 'breaks';

    protected $fillable = [
        'attendance_id',
        'start_time',
        'end_time',
        'duration',
        'reason'
    ];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
}
