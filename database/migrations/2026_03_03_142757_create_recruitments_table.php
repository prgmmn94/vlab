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
        Schema::create('recruitments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('npm')->unique();
            $table->string('jurusan');
            $table->integer('semester');
            $table->string('region');
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->string('sosial_media');
            $table->string('posisi_dilamar');
            $table->text('alamat');
            $table->string('berkas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitments');
    }
};
