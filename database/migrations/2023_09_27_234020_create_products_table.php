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
            $table->int('sort',11)->default(1)->comment('權重');
            $table->string('title_zh',191)->nullable()->default(NULL)->comment('商品名稱(中)');
            $table->string('title_en',191)->nullable()->default(NULL)->comment('商品名稱(英)');
            $table->string('type_id',191)->nullable()->default(NULL)->comment('分類');
            $table->string('info',155)->nullable()->default(NULL)->comment('商品簡介');
            $table->string('img',255)->nullable()->default(NULL)->comment('主要圖片');
            $table->date('lauch_date')->nullable()->default(NULL)->comment('上市日期');
            $table->bigInteger('weight',20)->nullable()->default(NULL)->comment('淨重(克)');
            $table->int('shelf_life',11)->nullable()->default(NULL)->comment('保存期限(月)');
            $table->longText('preserve')->nullable()->default(NULL)->comment('保存方式');
            $table->longText('content')->nullable()->default(NULL)->comment('內容');
            $table->longText('notes')->nullable()->default(NULL)->comment('注意事項');
            $table->string('video',255)->nullable()->default(NULL)->comment('影片連結');
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
