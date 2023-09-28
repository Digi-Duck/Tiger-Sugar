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
            $table->int('franchise_id')->nullable()->default('')->comment('加盟id');
            $table->string('name',255)->nullable()->default('')->comment('名稱');
            $table->string('address',255)->default('')->comment('地址');
            $table->string('phone',255)->default('')->comment('電話');
            $table->int('sort')->default(0)->comment('權重');
            $table->int('area_id')->nullable()->default('')->comment('地區id');
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
