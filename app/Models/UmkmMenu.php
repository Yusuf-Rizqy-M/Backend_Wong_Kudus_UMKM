<?php

// app/Models/UmkmMenu.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UmkmMenu extends Model
{
    use HasFactory;
    protected $fillable = [
        'umkm_id',
        'name',
        'description',
        'price',
        'image',
    ];

    public function umkm(): BelongsTo
    {
        return $this->belongsTo(Umkm::class, 'umkm_id');
    }
}