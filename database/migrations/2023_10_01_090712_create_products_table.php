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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('sort')->default(1)->comment('權重');
            $table->string('title_zh')->comment('中文商品名稱');
            $table->string('title_en')->comment('英文商品名稱');
            $table->integer('title_id')->comment('商品種類代號');
            $table->string('info')->comment('商品介紹');
            $table->string('img')->comment('圖片路徑');
            $table->date('launch_date')->comment('上架日期');
            $table->bigInteger('weight')->comment('商品淨重(克)');
            $table->smallInteger('shelf_life')->comment('保存期限(月)');
            $table->longText('preserve')->comment('保存方式');
            $table->longText('content')->comment('商品介紹');
            $table->longText('notes')->nullable()->comment('注意事項');
            $table->string('video')->nullable()->comment('影片連結');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
