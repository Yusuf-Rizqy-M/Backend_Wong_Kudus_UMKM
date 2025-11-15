<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <-- TAMBAHKAN INI

class Umkm extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'kecamatan',
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
     * Relasi ke Category
     */
    public function category(): BelongsTo // <-- Tambah type hint
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Relasi ke Galeri (diganti dari galeri -> gallery)
     */
    public function gallery(): HasMany // <-- REVISI: ganti nama fungsi & tambah type hint
    {
        // Anda menggunakan model GaleriUmkm, ini sudah benar
        return $this->hasMany(GaleriUmkm::class, 'umkm_id'); 
    }

    /**
     * Relasi ke Jam Buka
     */
    public function openingHours(): HasMany // <-- Tambah type hint
    {
        return $this->hasMany(UmkmOpeningHour::class, 'umkm_id');
    }

    /**
     * Relasi ke Listing
     */
    public function listing(): HasOne // <-- Tambah type hint
    {
        return $this->hasOne(UmkmListing::class, 'umkm_id');
    }

    /**
     * Relasi ke Lokasi
     */
    public function location(): HasOne
    {
        return $this->hasOne(UmkmLocation::class, 'umkm_id');
    }

    /**
     * Relasi ke Kontak
     */
    public function contact(): HasOne
    {
        return $this->hasOne(UmkmContact::class, 'umkm_id');
    }

    /**
     * Relasi ke Menu
     */
    public function menus(): HasMany
    {
        return $this->hasMany(UmkmMenu::class, 'umkm_id');
    }
}