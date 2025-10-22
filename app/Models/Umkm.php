<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'image',
        'rating',
        'review_count',
        'address',
        'kecamatan',
        'status'
    ];

    // Relasi: Setiap UMKM hanya punya satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
