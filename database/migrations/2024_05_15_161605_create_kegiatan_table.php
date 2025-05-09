<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id('id_kegiatan');
            $table->string('kode_kegiatan');
            $table->text('nama_kegiatan');
            $table->unsignedInteger('tahun');
            $table->unique(['kode_kegiatan', 'tahun'], 'unique_kegiatan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
