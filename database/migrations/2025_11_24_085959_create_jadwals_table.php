<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
    Schema::create('jadwals', function (Blueprint $table) {
        $table->id();
        $table->string('hari');
        $table->time('jam_mulai');
        $table->time('jam_selesai');
        $table->foreignId('mapel_id')->constrained('mapels');
        $table->foreignId('kelas_id')->constrained('kelas');
        $table->string('guru')->nullable();
        $table->timestamps();
     });
    }
    public function down() { Schema::dropIfExists('jadwals'); }
};
