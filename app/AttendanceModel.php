<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceModel extends Model
{
    use HasFactory;
    protected $table = 'attendances';

    protected $fillable = [
        'user_id',
        'check_in_time',
        'check_out_time',
        'check_in_ip',
        'check_out_ip',
        'status',
        'approved_by_id',
        'approved_at',
        'late_reason',
        'early_checkout_reason',
        'shift_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function trackings()
    {
        return $this->hasMany(Tracking::class, 'attendance_id');
    }

    public function visits()
    {
        return $this->hasMany(Visit::class, 'attendance_id');
    }

    public function breaks()
    {
        return $this->hasMany(AttendanceBreak::class, 'attendance_id');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }
}
