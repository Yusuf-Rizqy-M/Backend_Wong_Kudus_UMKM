<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu_umkms', function (Blueprint $table) {
            $table->id();
            $table->string('name_menu');
            $table->string('image_menu');
            $table->string('category');
            $table->foreignId('umkm_id')->constrained('umkms')->onDelete('cascade');
            $table->string('harga');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_umkms');
    }
};
