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
        Schema::create('user', function (Blueprint $table) {
            $table->string('id_user', 255)->primary();
            $table->string('username', 25);
            $table->string('password', 25);
            $table->string('nama', 50);
            $table->string('level', 25);
            $table->string('fakultas', 255)->nullable();
            $table->string('program_studi', 255)->nullable();
            $table->string('foto', 255)->nullable();
            $table->boolean('status')->default(0);
            $table->timestamp('modified')->nullable()->useCurrentOnUpdate();
        });

        // Custom session table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_user', 255)->index();
            $table->string('username', 25);
            $table->string('level', 25);
            $table->string('fakultas', 255)->nullable();
            $table->string('program_studi', 255)->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();

            // optional relation to user
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('sessions');
    }
};
