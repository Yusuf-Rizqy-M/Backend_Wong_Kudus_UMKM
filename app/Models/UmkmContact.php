<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UmkmContact extends Model
{
    use HasFactory;

    
    protected $primaryKey = 'umkm_id';
    public $incrementing = false;

    protected $fillable = [
        'umkm_id',
        'whatsapp',
        'email',
        'instagram',
    ];

    public function umkm(): BelongsTo
    {
        return $this->belongsTo(Umkm::class, 'umkm_id');
    }
}