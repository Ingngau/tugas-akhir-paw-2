<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
    Schema::create('nilais', function (Blueprint $table) {
        $table->id();
        $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
        $table->foreignId('mapel_id')->constrained('mapels')->onDelete('cascade');
        $table->integer('nilai_harian')->nullable();
        $table->integer('nilai_uts')->nullable();
        $table->integer('nilai_uas')->nullable();
        $table->string('semester');
        $table->timestamps();
    });
    }
    public function down() { Schema::dropIfExists('nilais'); }
};
