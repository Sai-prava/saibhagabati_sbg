<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormEntryField extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'form_entry_fields';

    protected $fillable = [
        'form_entry_id',
        'form_field_id',
        'created_by_id',
        'updated_by_id',
    ];

    public function formEntry()
    {
        return $this->belongsTo(FormEntry::class);
    }

    public function formField()
    {
        return $this->belongsTo(FormField::class);
    }
}
