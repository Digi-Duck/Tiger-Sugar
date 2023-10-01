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
            $table->string('main_photo')->nullable()->comment('主要照片');
            $table->string('author')->default('匿名')->comment('作者');
            $table->string('title')->comment('標題');
            $table->string('info')->comment('報導內文');
            $table->date('date')->comment('日期');
            $table->integer('sort')->default(1)->comment('權重');
            $table->string('link')->comment('報導連結');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_news');
    }
};
