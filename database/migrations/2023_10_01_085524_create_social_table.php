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
        Schema::create('social', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type')->comment('哪種模式 預設:embed/客製化:custom');
            $table->integer('sort')->default(1)->comment('權重');
            $table->string('embed_name')->nullable()->comment('預設模式的標題');
            $table->longText('embed_link')->nullable()->comment('預設模式的文章嵌入碼');
            $table->string('user_icon')->nullable()->comment('user_icon路徑');
            $table->string('user_name')->nullable()->comment('客製化使用者名稱');
            $table->string('user_account')->nullable()->comment('客製化使用者帳號');
            $table->string('social_icon')->nullable()->comment('客製化使用者icon');
            $table->string('social_icon_color')->nullable()->comment('使用者icon顏色');
            $table->string('link_title')->nullable()->comment('客製化連結名稱');
            $table->string('link_href')->nullable()->comment('客製化網址連結');
            $table->string('link_target')->nullable()->comment('是否另開分頁 null:不開/linktarget:要開');
            $table->longText('social_info')->nullable()->comment('客製化內容');
            $table->string('post_date')->nullable()->comment('客製化上傳日期');
            $table->string('user_photo')->nullable()->comment('客製化使用者icon路徑');
            $table->string('main_photo')->nullable()->comment('客製化主要圖片路徑');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social');
    }
};
