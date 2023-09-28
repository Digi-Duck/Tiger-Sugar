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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name',255)->default('')->comment('名稱');
            $table->string('email',255)->default('')->comment('Email');
            $table->string('password',255)->default('')->comment('密碼');
            $table->string('remember_token',100)->nullable()->default('')->comment('記住我');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
