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
        Schema::create('blog_news', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('main_photo',255)->nullable()->default('')->comment('上傳代表圖片');
            $table->string('author',255)->nullable()->default('')->comment('來源出處');
            $table->string('title',255)->nullable()->default('')->comment('文章標題');
            $table->string('info',255)->nullable()->default('')->comment('文章簡述');
            $table->string('date',191)->nullable()->default('')->comment('發表日期');
            $table->string('sort',255)->nullable()->default('')->comment('權重');
            $table->string('link',255)->nullable()->default('')->comment('文章連結');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
