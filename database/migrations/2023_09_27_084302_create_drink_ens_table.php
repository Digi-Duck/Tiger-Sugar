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
        Schema::create('drink_ens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->int('type_id',11)->default('')->comment('類別');
            $table->string('drink_name',255)->default('')->comment('飲品名稱');
            $table->int('cold',11)->nullable()->default(0)->comment('冷飲');
            $table->int('hot',11)->nullable()->default(0)->comment('熱飲');
            $table->int('sort',11)->default(1)->comment('權重');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drink_ens_');
    }
};