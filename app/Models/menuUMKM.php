<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuUmkm extends Model
{
    use HasFactory;

    protected $table = 'menu_umkms';

    protected $fillable = [
        'name_menu',
        'category',
        'umkm_id',
        'harga',
        'image_menu',
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id');
    }
}
