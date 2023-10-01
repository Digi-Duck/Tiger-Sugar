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
            $table->string('title')->comment('語言名稱');
            $table->string('en_title')->comment('語言英文名稱');
            $table->string('link')->comment('不同語系的網站');
            $table->string('hide')->comment('0:顯示 1:不顯示');
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
