<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('recruitment_period_id')
                ->constrained('recruitment_periods')
                ->onDelete('cascade');
            $table->string('nama_tahap');
            $table->string('link_google_sheets')->nullable();
            $table->text('deskripsi')->nullable();
            $table->unsignedInteger('urutan')->default(0);
            $table->boolean('is_published')->default(false);
            $table->timestamps();

            $table->index(['recruitment_period_id', 'urutan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
