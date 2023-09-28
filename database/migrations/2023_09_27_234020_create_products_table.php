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
            $table->int('sort')->default(1)->comment('權重');
            $table->string('title_zh',191)->nullable()->default('')->comment('中文標題');
            $table->string('title_en',191)->nullable()->default('')->comment('英文標題');
            $table->string('type_id',191)->nullable()->default('')->comment('種類名稱');
            $table->string('info',155)->nullable()->default('')->comment('副標題');
            $table->string('img',255)->nullable()->default('')->comment('圖片');
            $table->date('lauch_date')->nullable()->default('')->comment('發布日期');
            $table->bigInteger('weight')->nullable()->default('')->comment('重量');
            $table->int('shelf_life')->nullable()->default('')->comment('包存期限');
            $table->longText('preserve')->nullable()->comment('包存方式');
            $table->longText('content')->nullable()->comment('內容');
            $table->longText('notes')->nullable()->comment('註記');
            $table->string('video',255)->nullable()->default('')->comment('影片');
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
