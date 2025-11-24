<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
    Schema::create('siswa_eskul', function (Blueprint $table) {
        $table->id();
        $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
        $table->foreignId('ekskul_id')->constrained('ekstrakurikulers')->onDelete('cascade');
        $table->string('tahun_ajaran');
        $table->timestamps();
      });
    }
    public function down() { Schema::dropIfExists('siswa_eskul'); }
};
