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
            $table->smallInteger('continent_id')->comment('洲代號');
            $table->string('country_name')->comment('國家名字');
            $table->string('country_name_en')->comment('國家英文名字');
            $table->string('country_photo')->comment('國家照片路徑');
            $table->smallInteger('country_number')->comment('國家代號');
            $table->integer('sort')->default(1)->comment('權重');
            $table->string('fb_link')->comment('fb連結');
            $table->string('ig_link')->comment('ig連結');
            $table->string('link')->comment('官方網站連結');
            $table->string('weibo_link')->comment('微博連結');
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
