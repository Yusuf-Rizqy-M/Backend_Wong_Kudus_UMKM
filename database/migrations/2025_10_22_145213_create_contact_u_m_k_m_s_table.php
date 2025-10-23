<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contact_umkm', function (Blueprint $table) {
            $table->id();
            $table->string('sender_name');
            $table->string('sender_name_last')->nullable();
            $table->string('sender_email');
            $table->string('no_telepon', 14);
            $table->text('message');
            $table->enum('status', ['active', 'inactive', 'read'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_umkm');
    }
};
