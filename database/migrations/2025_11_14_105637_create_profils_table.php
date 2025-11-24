<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('npsn')->unique();
            $table->text('alamat');
            $table->string('telepon');
            $table->string('email');
            $table->string('website')->nullable();
            $table->text('sejarah');
            $table->text('visi');
            $table->text('misi');
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profils');
    }
};