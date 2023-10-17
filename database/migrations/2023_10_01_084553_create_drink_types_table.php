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
        Schema::create('drink_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type_name')->comment('飲品種類名稱');
            $table->string('type_info')->nullable()->comment('飲品種類介紹');
            $table->integer('sort')->default(1)->comment('權重');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drink_types');
    }
};
