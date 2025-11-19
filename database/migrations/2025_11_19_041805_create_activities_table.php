<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('activities', function (Blueprint $table) {
        $table->id();
        $table->string('actor')->nullable(); // 'admin' / 'user' / 'guest'
        $table->string('activity'); // contoh: "User memberi rating", "Admin menambah UMKM"
        $table->string('type'); // rating, contact, create, update, delete
        $table->unsignedBigInteger('related_id')->nullable(); // ID data yg terkait
        $table->string('related_table')->nullable(); // umkms, categories, rating_websites
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
