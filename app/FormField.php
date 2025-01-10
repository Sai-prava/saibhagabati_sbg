<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;
    
    protected $table = 'form_fields';

    protected $fillable = [
        'form_id',
        'order',
        'field_type',
        'label',
        'placeholder',
        'is_required',
        'min_length',
        'max_length',
        'default_values',
        'values',
        'is_enabled',
        'created_by_id',
        'updated_by_id',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
