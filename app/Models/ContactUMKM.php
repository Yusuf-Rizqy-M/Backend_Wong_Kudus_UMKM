<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUmkm extends Model
{
    use HasFactory;

    protected $table = 'contact_umkm';

    protected $fillable = [
        'sender_name','sender_name_last','sender_email','no_telepon','message','status',];
}
