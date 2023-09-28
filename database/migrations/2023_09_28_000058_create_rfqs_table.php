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
        Schema::create('rfqs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name',50)->nullable()->default(NULL)->comment('報價名稱');
            $table->string('birthday',50)->nullable()->default(NULL)->comment('報價日期');
            $table->string('email',50)->nullable()->default(NULL)->comment('Email');
            $table->string('phone',50)->nullable()->default(NULL)->comment('電話');
            $table->string('address',255)->nullable()->default(NULL)->comment('地址');
            $table->string('channel',255)->nullable()->default(NULL)->comment('頻道');
            $table->string('city',50)->nullable()->default(NULL)->comment('城市');
            $table->string('other',255)->nullable()->default(NULL)->comment('其他');
            $table->string('products_id',50)->nullable()->default(NULL)->comment('商品名稱');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfqs');
    }
};
