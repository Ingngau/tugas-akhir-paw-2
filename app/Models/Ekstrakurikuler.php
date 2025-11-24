<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;
    protected $fillable = ['nama_ekskul','pembina','jadwal','tempat','deskripsi'];


    public function siswas() {
        return $this->belongsToMany(Siswa::class, 'siswa_eskul', 'ekskul_id', 'siswa_id');
    }
}
