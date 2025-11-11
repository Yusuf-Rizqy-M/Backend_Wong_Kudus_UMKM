<?php
// database/migrations/..._create_umkm_opening_hours_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('umkm_opening_hours', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('umkm_id')
                  ->constrained('umkms')
                  ->onDelete('cascade');
            $table->enum('day', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
            $table->string('hours')->nullable(); 
            $table->boolean('is_open')->default(true);
            $table->string('status')->default('active'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkm_opening_hours');
    }
};