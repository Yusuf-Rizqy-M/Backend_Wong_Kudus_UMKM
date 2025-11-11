<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('umkm_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('umkm_id')->constrained('umkms')->onDelete('cascade');
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

    }
};