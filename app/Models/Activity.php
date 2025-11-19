<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
     protected $fillable = [
        'actor',
        'activity',
        'type',
        'related_id',
        'related_table',
    ];
}
