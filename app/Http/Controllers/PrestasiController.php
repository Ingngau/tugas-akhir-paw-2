<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index() { return Prestasi::all(); }
    public function store(Request $r) { return Prestasi::create($r->all()); }
    public function show(Prestasi $prestasi) { return $prestasi; }
    public function update(Request $r, Prestasi $prestasi) { $prestasi->update($r->all()); return $prestasi; }
    public function destroy(Prestasi $prestasi) { $prestasi->delete(); return ['message'=>'Deleted']; }
}
