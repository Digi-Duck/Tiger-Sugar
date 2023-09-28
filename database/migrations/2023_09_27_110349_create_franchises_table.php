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
        Schema::create('franchises', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('continent_id')->nullable()->default(1)->comment('海外據點管理');
            $table->string('country_name',255)->nullable()->default(NULL)->comment('國家名稱');
            $table->string('country_en_name',255)->nullable()->default(NULL)->comment('國家英文名稱');
            $table->string('country_photo',255)->nullable()->default(NULL)->comment('上傳代表圖片');
            $table->integer('country_number')->nullable()->default(0)->comment('國家數');
            $table->integer('sort')->nullable()->default(1)->comment('權重');
            $table->string('fb_link',255)->nullable()->default(NULL)->comment('FB連結');
            $table->string('ig_link',255)->nullable()->default(NULL)->comment('IG連結');
            $table->string('link',255)->nullable()->default(NULL)->comment('官方網站連結');
            $table->string('weibo_link',255)->nullable()->default(NULL)->comment('微博連結');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchises');
    }
};
