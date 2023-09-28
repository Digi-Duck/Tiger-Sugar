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
            $table->string('type',255)->nullable()->default('embed')->comment('權重');
            $table->int('sort',11)->default(1)->comment('社群回饋代稱');
            $table->string('embed_name',255)->nullable()->default(null)->comment('嵌入碼');
            $table->longText('embed_link')->nullable()->comment('使用者Icon');
            $table->string('user_icon',255)->nullable()->default(NULL)->comment('使用者Icon');
            $table->string('user_name',255)->nullable()->default(NULL)->comment('使用者名稱');
            $table->string('user_account',255)->nullable()->default(NULL)->comment('使用者帳號');
            $table->string('socail_icon',255)->nullable()->default(NULL)->comment('社群icon');
            $table->string('socail_icon_color',255)->nullable()->default(NULL)->comment('社群icon顏色');
            $table->string('link_title',255)->nullable()->default(NULL)->comment('連結名稱');
            $table->string('link_href',255)->nullable()->default(NULL)->comment('超連結網址');
            $table->string('link_target',255)->nullable()->default(NULL)->comment('是否新開視窗');
            $table->longText('socail_info')->nullable()->comment('內容');
            $table->string('post_date',255)->nullable()->default(NULL)->comment('發布日期');
            $table->string('user_photo',255)->nullable()->default(NULL)->comment('使用者圖片');
            $table->string('main_photo',255)->nullable()->default(NULL)->comment('主要圖片');
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
