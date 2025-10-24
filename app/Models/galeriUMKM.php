<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriUmkm extends Model
{
    use HasFactory;

    protected $table = 'galeri_umkms';

    protected $fillable = ['umkm_id','name','image','status',];

    /**
     * Relasi ke model Umkm (many-to-one)
     */
    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id');
    }
}
