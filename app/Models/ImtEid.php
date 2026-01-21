<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImtEid extends Model
{
    protected $fillable = [
        'ph_date',
        'ph_time',
        'ctrl_number',
        'full_name',
        'imt_position',
        'office_designation',
        'office_agency',
        'contact_number',
        'place_assignment',
        'photo_path',
    ];
}
