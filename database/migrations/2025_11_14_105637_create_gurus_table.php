<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();

            // Data utama
            $table->string('nip')->unique();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);

            // Data pribadi
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');

            // Kontak & tambahan
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->unique();

            // Akademik
            $table->string('jabatan');
            $table->string('mata_pelajaran');
            $table->string('kelas_diampu')->nullable();

            // File foto
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gurus');
    }
};
