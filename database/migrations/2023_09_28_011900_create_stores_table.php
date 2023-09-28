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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('franchise_id')->nullable()->default(NULL)->comment('加盟名稱');
            $table->string('name',255)->nullable()->default(NULL)->comment('店名');
            $table->string('address',255)->default('')->comment('地址');
            $table->string('phone',255)->nullable()->default(NULL)->comment('電話');
            $table->integer('sort')->default(1)->comment('權重');
            $table->integer('area_id')->nullable()->default(NULL)->comment('國家');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
