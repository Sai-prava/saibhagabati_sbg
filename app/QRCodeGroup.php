<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCodeGroup extends Model
{
    use HasFactory;
    protected $table = 'qr_code_groups';

    protected $fillable = [
        'name',
        'description',
        'status',
        'created_by_id',
        'updated_by_id',
    ];

    public function qrCodes()
    {
        return $this->hasMany(QrCodeModel::class, 'qr_code_group_id');
    }

    public function qrCodeVerifications()
    {
        return $this->hasMany(QRCodeVerificationLog::class, 'qr_code_group_id');
    }
}
