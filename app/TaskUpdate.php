<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskUpdate extends Model
{
    use HasFactory;
    
    protected $table = 'task_updates';


    protected $fillable = [
        'task_id',
        'comment',
        'latitude',
        'longitude',
        'address',
        'file_url',
        'is_admin',
        'form_entry_id',
        'update_type',
        'created_by_id',
        'updated_by_id',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function formEntry()
    {
        return $this->belongsTo(FormEntry::class, 'form_entry_id');
    }
}
