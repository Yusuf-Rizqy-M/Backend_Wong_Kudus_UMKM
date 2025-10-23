<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingWebsite extends Model
{
    use HasFactory;

    protected $table = 'rating_website';

    protected $fillable = [
        'name',
        'name_last',
        'email',
        'rating',
        'photo_profil',
        'comment',
    ];
}
