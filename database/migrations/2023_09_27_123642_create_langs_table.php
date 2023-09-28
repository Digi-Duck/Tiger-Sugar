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
        Schema::create('langs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title',45)->comment('標題');
            $table->string('en_title',45)->nullable()->default(NULL)->comment('英文標題');
            $table->string('link',45)->comment('官方網站連結');
            $table->string('hide',45)->default(0)->comment('隱藏');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('langs');
    }
};
