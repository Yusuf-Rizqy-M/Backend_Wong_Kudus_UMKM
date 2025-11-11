<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('umkm_menus', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('umkm_id')->constrained('umkms')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('price')->nullable(); 
            $table->string('image')->nullable();
            $table->string('status')->default('active'); 
            $table->timestamps();
        });
    }
};