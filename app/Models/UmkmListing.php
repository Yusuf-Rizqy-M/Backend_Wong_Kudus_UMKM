<?php
// App/Models/UmkmListing.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmkmListing extends Model
{
    use HasFactory;

    // Sesuaikan nama tabel
    protected $table = 'umkm_listings';

    // Kolom yang boleh diisi
    protected $fillable = [
        'umkm_id',
        'category',
        'subtitle',
        'location',
        'kecamatan_slug',
        'image','status'
    ];

    /**
     * Relasi ke model Umkm.
     */
    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id');
    }
}