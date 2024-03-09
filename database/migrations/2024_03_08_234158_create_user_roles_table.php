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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');

            $table->timestamps();

            $table->index('user_id', 'user_id_user_idx');
            $table->index('role_id', 'role_id_id_idx');

            $table->foreign('user_id', 'user_id_user_fk')->on('users')->references('id');
            $table->foreign('role_id', 'user_id_id_fk')->on('roles')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
