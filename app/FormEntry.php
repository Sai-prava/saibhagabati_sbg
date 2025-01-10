<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormEntry extends Model
{
    use HasFactory;
    protected $table = 'form_entries';

    protected $fillable = [
        'form_id',
        'user_id',
        'client_id',
        'created_by_id',
        'updated_by_id',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function fields()
    {
        return $this->hasMany(FormEntryField::class);
    }

    public function taskUpdate()
    {
        return $this->hasOne(TaskUpdate::class);
    }


}
