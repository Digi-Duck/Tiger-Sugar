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
            $table->string('name',50)->nullable()->default('')->comment('名稱');
            $table->string('birthday',50)->nullable()->default('')->comment('出生年月日');
            $table->string('email',50)->nullable()->default('')->comment('email');
            $table->string('phone',50)->nullable()->default('')->comment('電話');
            $table->string('address',255)->nullable()->default('')->comment('地址');
            $table->string('channel',255)->nullable()->default('')->comment('頻道');
            $table->string('city',50)->nullable()->default('')->comment('城市');
            $table->string('other',255)->nullable()->default('')->comment('其他');
            $table->string('products_id',50)->nullable()->default('')->comment('商品id');
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
