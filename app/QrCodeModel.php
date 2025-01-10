<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCodeModel extends Model
{
    use HasFactory;
    protected $table = 'qr_codes';

    protected $fillable = [
        'name',
        'description',
        'qr_code_group_id',
        'code',
        'is_enabled',
        'created_by_id',
        'updated_by_id',
    ];

    public function group()
    {
        return $this->belongsTo(QRCodeGroup::class, 'qr_code_group_id');
    }
}
