<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'telepon',
        'email',
        'kelas',
        'jurusan',
        'foto'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function prestasis() {
        return $this->hasMany(Prestasi::class);
    }

    public function nilais() {
        return $this->hasMany(Nilai::class);
    }

    public function ekskul() {
        return $this->belongsToMany(Ekstrakurikuler::class, 'siswa_eskul', 'siswa_id', 'ekskul_id');
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }
}