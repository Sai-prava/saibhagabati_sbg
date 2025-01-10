<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpAddressVerificationLog extends Model
{
    use HasFactory;
    protected $table = 'ip_address_verification_logs';

    protected $fillable = [
        'user_id',
        'ip',
        'is_verified',
        'verified_at',
        'reason',
        'site_id',
        'ip_address_group_id',
        'created_by_id',
        'updated_by_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function ipAddressGroup()
    {
        return $this->belongsTo(IpAddressGroup::class);
    }
}
