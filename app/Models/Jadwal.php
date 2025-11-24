<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $fillable = ['hari','jam_mulai','jam_selesai','mapel_id','kelas_id','guru'];


    public function mapel() {
        return $this->belongsTo(Mapel::class);
    }


    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }
}
