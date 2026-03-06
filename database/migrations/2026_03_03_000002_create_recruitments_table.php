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
            $table->uuid('recruitment_period_id');
            $table->year('tahun');
            $table->string('id_calas')->nullable();

            $table->string('nama');
            $table->string('npm');
            $table->string('jurusan');
            $table->string('kelas');
            $table->string('region');
            $table->string('posisi_dilamar');

            $table->string('agama');
            $table->string('email');
            $table->string('no_hp');
            $table->text('alamat');

            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();

            $table->string('sosial_media');
            $table->string('berkas');

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('recruitment_period_id')
                ->references('id')
                ->on('recruitment_periods')
                ->onDelete('cascade');

            // Index untuk performa query
            $table->index('tahun');
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
