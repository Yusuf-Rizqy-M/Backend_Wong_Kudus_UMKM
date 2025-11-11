<?php
// App/Models/UmkmOpeningHour.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmkmOpeningHour extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'umkm_opening_hours';

    // Kolom yang boleh diisi
    protected $fillable = [
        'umkm_id',
        'day',
        'hours',
        'is_open','status'
    ];

    /**
     * Relasi ke model Umkm.
     */
    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id');
    }
}