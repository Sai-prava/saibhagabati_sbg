<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
    use HasFactory;
    protected $table = 'ip_addresses';

    protected $fillable = [
        'ip_address',
        'name',
        'description',
        'created_by_id',
        'updated_by_id',
        'ip_address_group_id',
        'is_enabled',
    ];

    public function ipAddressGroup()
    {
        return $this->belongsTo(IpAddressGroup::class);
    }
}
