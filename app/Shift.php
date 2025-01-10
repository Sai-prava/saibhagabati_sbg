<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $table = 'shifts';

    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'status',
        'sunday',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'created_by_id',
        'updated_by_id',
        'is_site_specific',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'shift_id');
    }

    public function sites()
    {
        return $this->hasMany(Site::class, 'shift_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
