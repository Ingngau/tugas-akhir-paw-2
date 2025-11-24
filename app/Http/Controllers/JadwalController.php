<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index() { return Jadwal::all(); }
    public function store(Request $r) { return Jadwal::create($r->all()); }
    public function show(Jadwal $jadwal) { return $jadwal; }
    public function update(Request $r, Jadwal $jadwal) { $jadwal->update($r->all()); return $jadwal; }
    public function destroy(Jadwal $jadwal) { $jadwal->delete(); return ['message'=>'Deleted']; }
}
