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
        Schema::create('dataorganisasi', function (Blueprint $table) {
            $table->id('id_organisasi');
            $table->string('nim', 20);
            $table->string('tingkat_organisasi', 255)->nullable();
            $table->string('nama_organisasi', 255)->nullable();
            $table->string('jbt_organisasi', 255)->nullable();
            $table->date('tanggal_kegiatan_a', 255)->nullable();
            $table->date('tanggal_kegiatan_e', 255)->nullable();
            $table->integer('periode')->nullable();
            $table->string('unggah_sk', 255)->nullable();
            $table->integer('status')->default(0);
            $table->timestamp('modified')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataorganisasi');
    }
};
