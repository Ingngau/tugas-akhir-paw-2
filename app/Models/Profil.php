<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_sekolah',
        'npsn',
        'alamat',
        'telepon',
        'email',
        'website',
        'sejarah',
        'visi',
        'misi',
        'logo'
    ];
}