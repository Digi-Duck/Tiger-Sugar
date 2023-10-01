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
        Schema::create('drinks_en', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('type_id')->comment('飲品類型代號');
            $table->string('drink_name')->comment('飲品英文名稱');
            $table->integer('cold')->nullable()->comment('冷飲');
            $table->integer('hot')->nullable()->comment('熱飲');
            $table->integer('sort')->default(1)->comment('權重');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drinks_en');
    }
};
