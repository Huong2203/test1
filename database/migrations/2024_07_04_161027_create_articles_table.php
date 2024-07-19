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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->comment('Tiêu đề của bài đăng');
            $table->string('slug')->unique();
            $table->text("content")->comment('Nội dung chính của bài đăng');

            $table->enum("status", ['draft', 'published', 'archived'])->default('published')->comment('Trạng thái của bài đăng');
            $table->enum("is_hot", ['1', '2', '3'])->default('3')->comment('Tình trạng trending của bài đăng');

            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->foreignIdFor(\App\Models\Category::class)->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
