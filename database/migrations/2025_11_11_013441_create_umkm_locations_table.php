<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('umkm_locations', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('umkm_id')->constrained('umkms')->onDelete('cascade');
            $table->string('address')->nullable();
            $table->text('full_address')->nullable();
            $table->string('maps_url')->nullable();
            $table->text('embed_url')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }
};
