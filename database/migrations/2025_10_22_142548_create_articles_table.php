<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('article_blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_blog_id')->constrained('category_blogs')->onDelete('cascade');
            $table->string('author');
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('image')->nullable(); 
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
