<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'teams';

    protected $fillable = [
        'name',
        'description',
        'status',
        'is_chat_enabled',
        'created_by_id',
        'updated_by_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'team_id');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'team_id');
    }
}
