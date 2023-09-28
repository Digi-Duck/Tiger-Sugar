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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('user_name',255)->nullable()->default('')->comment('姓名');
            $table->string('country',255)->nullable()->default('')->comment('國家/城市');
            $table->string('birth_day',255)->nullable()->default('')->comment('出生年月日');
            $table->string('email',255)->nullable()->default('')->comment('Email');
            $table->string('phone',255)->nullable()->default('')->comment('電話');
            $table->string('address',255)->nullable()->default('')->comment('聯絡地址');
            $table->string('store_address',255)->nullable()->default('')->comment('預定城市地址');
            $table->string('other',255)->nullable()->default('')->comment('其他');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
