<?php

// app/Models/UmkmLocation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UmkmLocation extends Model
{
    use HasFactory;

    protected $primaryKey = 'umkm_id';

    public $incrementing = false;

    protected $fillable = [
        'umkm_id',
        'address',
        'full_address',
        'maps_url',
        'embed_url',
    ];
    public function umkm(): BelongsTo
    {
        return $this->belongsTo(Umkm::class, 'umkm_id');
    }
}