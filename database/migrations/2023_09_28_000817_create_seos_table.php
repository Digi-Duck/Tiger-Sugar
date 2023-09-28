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
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name',191)->nullable()->default('')->comment('名稱');
            $table->string('title',191)->nullable()->default('')->comment('標題');
            $table->string('keyword',191)->nullable()->default('')->comment('關鍵字');
            $table->string('description',191)->nullable()->default('')->comment('描述');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seos');
    }
};
