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
        Schema::create('franchise_explains', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->comment('問題標題');
            $table->longText('content')->comment('問題回覆');
            $table->string('english_title')->comment('英文問題標題');
            $table->longText('english_content')->comment('英文問題回覆');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchise_explains');
    }
};
