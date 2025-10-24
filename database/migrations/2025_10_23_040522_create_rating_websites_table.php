<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rating_website', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_last')->nullable(); // dibuat opsional
            $table->string('email')->nullable();
            $table->float('rating')->default(0);
            $table->string('photo_profil')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rating_website');
    }
};
