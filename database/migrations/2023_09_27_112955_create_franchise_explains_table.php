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
            $table->string('title',255)->nullable()->default('')->comment('標題');
            $table->longText('content')->nullable()->comment('內文');
            $table->string('title',255)->nullable()->default('')->comment('英文標題');
            $table->longText('english_content')->nullable()->comment('內文(英)');
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
