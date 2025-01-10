<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCodeVerificationLog extends Model
{
    use HasFactory;
    protected $table = 'qr_code_verification_logs';

    protected $fillable = [
        'user_id',
        'qr_code',
        'is_verified',
        'verified_at',
        'reason',
        'site_id',
        'qr_code_group_id',
        'created_by_id',
        'updated_by_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }

    public function qrCodeGroup()
    {
        return $this->belongsTo(QrCodeGroup::class, 'qr_code_group_id');
    }
}
