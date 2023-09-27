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
        Schema::create('drinks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->int('type_id')->default('')->comment('類別');
            $table->string('drink_name',255)->default('')->comment('飲品名稱');
            $table->int('cold')->nullable()->default(0)->comment('冷飲');
            $table->int('hot')->nullable()->default(0)->comment('熱飲');
            $table->int('sort')->default(0)->comment('權重');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drinks');
    }
};
