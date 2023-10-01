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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->smallInteger('country_id')->comment('國家代號');
            $table->string('city_name')->comment('城市名字');
            $table->string('city_name_en')->comment('城市英文名字');
            $table->string('city_photo')->nullable()->comment('城市照片');
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
        Schema::dropIfExists('cities');
    }
};
