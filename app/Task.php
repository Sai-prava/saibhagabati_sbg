<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'type',
        'assigned_by_id',
        'user_id',
        'client_id',
        'site_id',
        'latitude',
        'longitude',
        'max_radius',
        'start_date_time',
        'end_date_time',
        'for_date',
        'status',
        'due_date',
        'start_form_id',
        'end_form_id',
        'created_by_id',
        'updated_by_id',
        'is_geo_fence_enabled',
    ];

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }

    public function startForm()
    {
        return $this->belongsTo(Form::class, 'start_form_id');
    }

    public function endForm()
    {
        return $this->belongsTo(Form::class, 'end_form_id');
    }

    public function taskUpdates()
    {
        return $this->hasMany(TaskUpdate::class, 'task_id');
    }

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'is_geo_fence_enabled' => 'boolean',
    ];
}
