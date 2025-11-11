<?php
// database/migrations/..._create_umkm_listings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Nama tabel 'umkm_listings' (jamak) adalah konvensi Laravel
        Schema::create('umkm_listings', function (Blueprint $table) {
            $table->id();

            // 'umkm_id' harus unik untuk relasi One-to-One
            $table->foreignId('umkm_id')
                  ->constrained('umkms')
                  ->onDelete('cascade')
                  ->unique(); // <-- PENTING untuk One-to-One

            $table->string('category')->nullable(); // Sesuai diagram
            $table->text('subtitle')->nullable();
            $table->string('location')->nullable();
            $table->string('kecamatan_slug')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('active'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkm_listings');
    }
};