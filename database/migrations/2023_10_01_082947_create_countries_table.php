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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->smallInteger('continent_id')->comment('洲代號');
            $table->string('country_name')->comment('國家名字');
            $table->string('country_en_name')->comment('國家英文名字');
            $table->string('country_photo')->nullable()->comment('國家照片');
            $table->integer('sort')->default(1)->comment('權重');
            $table->string('fb_link')->nullable()->comment('fb連結');
            $table->string('ig_link')->nullable()->comment('ig連結');
            $table->string('link')->nullable()->comment('官網連結');
            $table->string('weibo_link')->nullable()->comment('微博連結');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
