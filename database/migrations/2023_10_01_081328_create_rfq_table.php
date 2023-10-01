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
        Schema::create('rfq', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->comment('使用者名字');
            $table->date('birthday')->comment('使用者生日');
            $table->string('email')->comment('使用者郵件');
            $table->string('phone')->comment('使用者電話');
            $table->string('address')->comment('使用者地址');
            $table->string('channel')->comment('欲販售的管道為何');
            $table->string('city')->comment('欲販售的城市');
            $table->string('other')->nullable()->comment('其他備註');
            $table->integer('products_id')->comment('商品代號');
        });

        Schema::table('rfq', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfq');
    }
};
