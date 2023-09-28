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
        Schema::create('drink_type_ens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type_name',255)->default('')->comment('類型名稱');
            $table->string('type_info',255)->nullable()->default(NULL)->comment('副標題');
            $table->int('sort',11)->default(1)->comment('權重');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drink_type_ens');
    }
};
