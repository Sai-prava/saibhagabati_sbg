<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'latitude',
        'longitude',
        'contact_person_name',
        'radius',
        'city',
        'state',
        'remarks',
        'image_url',
        'status',
        'created_by_id',
    ];

    public function sites()
    {
        return $this->hasMany(Site::class, 'client_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'client_id', 'id');
    }

    public function forms()
    {
        return $this->hasMany(Form::class, 'client_id', 'id');
    }

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];
}
