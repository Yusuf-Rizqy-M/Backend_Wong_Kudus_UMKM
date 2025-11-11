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
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function galeri()
    {
        return $this->hasMany(GaleriUmkm::class, 'umkm_id');
    }
    public function openingHours()
    {
        return $this->hasMany(UmkmOpeningHour::class, 'umkm_id');
    }

    public function listing()
    {
        return $this->hasOne(UmkmListing::class, 'umkm_id');
    }
}