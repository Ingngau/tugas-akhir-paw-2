<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'telepon',
        'email',
        'jabatan',
        'mata_pelajaran',
        'kelas_diampu',
        'foto'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}