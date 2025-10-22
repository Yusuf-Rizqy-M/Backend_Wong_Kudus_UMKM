<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'icon',
        'status'
    ];

    public function umkms()
    {
        return $this->hasMany(Umkm::class, 'category_id');
    }
}
