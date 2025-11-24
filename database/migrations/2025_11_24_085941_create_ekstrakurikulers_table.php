<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
    Schema::create('ekstrakurikulers', function (Blueprint $table) {
        $table->id();
        $table->string('nama_ekskul');
        $table->string('pembina')->nullable();
        $table->string('jadwal')->nullable();
        $table->string('tempat')->nullable();
        $table->text('deskripsi')->nullable();
        $table->timestamps();
     });
    }
    public function down() { Schema::dropIfExists('ekstrakurikulers'); }
};
