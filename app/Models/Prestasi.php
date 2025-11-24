<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $fillable = ['siswa_id','judul','tingkat','peringkat','tahun','deskripsi'];


    public function siswa() {
     return $this->belongsTo(Siswa::class);
    }
}
