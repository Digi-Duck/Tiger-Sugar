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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('user_name')->comment('加盟主名字');
            $table->string('country')->nullable()->comment('加盟店所在國家');
            $table->date('birth_day')->comment('加盟主生日');
            $table->string('email')->comment('加盟主電子郵件');
            $table->string('phone')->comment('加盟主電話');
            $table->string('address')->comment('加盟主住址');
            $table->string('store_address')->comment('加盟店店址');
            $table->string('other')->nullable()->comment('其他問題');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
