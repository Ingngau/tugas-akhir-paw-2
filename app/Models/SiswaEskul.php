<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaEskul extends Model
{
    use HasFactory;
    protected $table = 'siswa_eskul';
    protected $fillable = ['siswa_id','ekskul_id','tahun_ajaran'];

    public function siswa() {
        return $this->belongsTo(Siswa::class);
    }

    public function ekskul() {
        return $this->belongsTo(Ekstrakurikuler::class, 'ekskul_id');
    }

}
