<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index() { return Mapel::all(); }
    public function store(Request $r) { return Mapel::create($r->all()); }
    public function show(Mapel $mapel) { return $mapel; }
    public function update(Request $r, Mapel $mapel) { $mapel->update($r->all()); return $mapel; }
    public function destroy(Mapel $mapel) { $mapel->delete(); return ['message'=>'Deleted']; }
}
