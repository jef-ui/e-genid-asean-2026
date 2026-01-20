<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StgeprEid extends Model
{
    
    protected $fillable = [
        'ph_date',
        'ph_time',
        'ctrl_number',
        'full_name',
        'stgepr_position',
        'office_designation',
        'office_agency',
        'contact_number',
        'place_assignment',
        'photo_path',
    ];
}
