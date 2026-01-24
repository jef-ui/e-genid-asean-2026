<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    //
        protected $fillable = [
        'log_date',
        'log_time',
        'action_taken',
        'reported_by',
        'attachment',
    ];
}
