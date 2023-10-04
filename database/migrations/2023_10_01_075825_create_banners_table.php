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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('圖片')->comment('圖片或影片');
            $table->string('pc_image_url')->nullable()->comment('電腦版圖片url');
            $table->string('mb_image_url')->nullable()->comment('手機版圖片url');
            $table->string('image_alt')->nullable()->comment('圖片替代文字');
            $table->string('pc_video_url')->nullable()->comment('電腦版影片url');
            $table->string('mb_video_url')->nullable()->comment('手機版影片url');
            $table->integer('sort')->default(1)->comment('權重');
            $table->string('link_url')->nullable()->comment('圖片連結');
            $table->string('link_target')->nullable()->comment('開新分頁的連結');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
