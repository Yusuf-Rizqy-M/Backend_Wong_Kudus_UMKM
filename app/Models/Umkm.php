<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id', // <-- DITAMBAHKAN
        'kecamatan',   // <-- DITAMBAHKAN
        'name',
        'slug',
        'hero_image',
        'hero_title',
        'hero_subtitle',
        'description',
        'about',
        'rating',
        'status',
    ];

    /**
     * Mendapatkan kategori dari UMKM.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}