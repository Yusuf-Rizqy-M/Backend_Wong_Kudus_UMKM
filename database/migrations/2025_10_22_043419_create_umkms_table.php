<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->float('rating')->default(0);
            $table->integer('review_count')->default(0);
            $table->string('address')->nullable();
            $table->enum('kecamatan', ['Kudus Kota', 'Jati', 'Bae', 'Mejobo', 'Undaan', 'Gebog', 'Dawe'])->nullable();
            $table->string('map_link')->nullable(); // Link Google Maps
            $table->time('jam_buka')->nullable(); // Waktu buka
            $table->time('jam_tutup')->nullable(); // Waktu tutup
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('no_wa', 14);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
