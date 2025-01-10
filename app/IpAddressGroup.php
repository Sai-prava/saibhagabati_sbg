<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpAddressGroup extends Model
{
    use HasFactory;
    
    protected $table = 'ip_address_groups';

    protected $fillable = [
        'name',
        'description',
        'created_by_id',
        'updated_by_id',
    ];

    public function ipAddresses()
    {
        return $this->hasMany(IpAddress::class);
    }

    public function verifications()
    {
        return $this->hasMany(IpAddressVerificationLog::class);
    }
}
