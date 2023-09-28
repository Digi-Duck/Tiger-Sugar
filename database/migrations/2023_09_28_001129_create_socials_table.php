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
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type',255)->nullable()->default('embed')->comment('embed or custom');
            $table->int('sort')->default(1)->comment('權重');
            $table->string('embed_name',255)->nullable()->default('')->comment('嵌入名稱');
            $table->longText('embed_link',255)->nullable()->comment('嵌入連結');
            $table->string('user_icon',255)->nullable()->default('')->comment('使用者icon');
            $table->string('user_name',255)->nullable()->default('')->comment('使用者名稱');
            $table->string('user_account',255)->nullable()->default('')->comment('使用者帳號');
            $table->string('socail_icon',255)->nullable()->default('')->comment('社群icon');
            $table->string('socail_icon_color',255)->nullable()->default('')->comment('社群icon顏色');
            $table->string('link_title',255)->nullable()->default('')->comment('連結標題');
            $table->string('link_href',255)->nullable()->default('')->comment('連結href');
            $table->string('link_target',255)->nullable()->default('')->comment('連結目標');
            $table->longText('socail_info',255)->nullable()->comment('社群副標題');
            $table->string('post_date',255)->nullable()->default('')->comment('發布日期');
            $table->string('user_photo',255)->nullable()->default('')->comment('使用者照片');
            $table->string('main_photo',255)->nullable()->default('')->comment('主要照片');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socials');
    }
};
