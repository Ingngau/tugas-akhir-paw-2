<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index() { return Kelas::all(); }
    public function store(Request $r) { return Kelas::create($r->all()); }
    public function show(Kelas $kelas) { return $kelas; }
    public function update(Request $r, Kelas $kelas) { $kelas->update($r->all()); return $kelas; }
    public function destroy(Kelas $kelas) { $kelas->delete(); return ['message'=>'Deleted']; }
}
