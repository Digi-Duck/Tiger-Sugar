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
            $table->timestamps();
            $table->string('type',255)->default('')->comment('圖片');
            $table->string('pc_img_url',255)->nullable()->default('')->comment('上傳圖片');
            $table->string('mb_img_url',255)->nullable()->default('')->comment('上傳圖片(手機版)');
            $table->string('image_alt',255)->nullable()->default('')->comment('圖片替代文字(alt)');
            $table->string('pc_video_url',255)->nullable()->default('')->comment('設定影片連結');
            $table->string('mb_video_url',255)->nullable()->default('')->comment('設定影片連結(手機版)');
            $table->integer('sort')->nullable()->default(1)->comment('權重');
            $table->string('link_url',255)->nullable()->default('')->comment('圖片連結');
            $table->string('link_target',255)->nullable()->default('')->comment('另開新視窗');
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
