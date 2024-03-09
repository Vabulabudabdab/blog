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
            $table->string('name')->default('');
            $table->string('email')->unique();
            $table->string('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();//Странно, только только при ubi не выдаёт ошибку, надо потестить
            $table->timestamps();

            $table->index('role_id', 'user_role_idx');
            $table->foreign('role_id', 'user_role_fk')->on('roles')->references('id');;
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
