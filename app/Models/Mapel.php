<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $fillable = ['nama_mapel','kode_mapel','guru','deskripsi'];
    
    public function nilais() {
        return $this->hasMany(Nilai::class);
    }

    public function jadwals() {
        return $this->hasMany(Jadwal::class);
    }
}
