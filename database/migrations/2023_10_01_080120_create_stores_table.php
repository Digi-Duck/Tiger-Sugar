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
            $table->integer('franchise_id')->comment('加盟國家代號');
            $table->string('name')->comment('店鋪名稱');
            $table->string('address')->comment('店鋪地址');
            $table->string('phone')->comment('店鋪連絡電話');
            $table->integer('sort')->default(1)->comment('權重');
            $table->integer('area_id')->comment('區域代號');
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
