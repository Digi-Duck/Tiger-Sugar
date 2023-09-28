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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->int('contry_id',11)->nullable()->default(NULL)->comment('國家');
            $table->int('contry_id',11)->nullable()->default(NULL)->comment('城市');
            $table->string('name',255)->nullable()->default(NULL)->comment('店名');
            $table->string('address',255)->default('')->comment('地址');
            $table->string('phone',255)->nullable()->default(NULL)->comment('電話');
            $table->int('sort',11)->default(0)->comment('權重');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
