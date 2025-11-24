<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index() { return Nilai::all(); }
    public function store(Request $r) { return Nilai::create($r->all()); }
    public function show(Nilai $nilai) { return $nilai; }
    public function update(Request $r, Nilai $nilai) { $nilai->update($r->all()); return $nilai; }
    public function destroy(Nilai $nilai) { $nilai->delete(); return ['message'=>'Deleted']; }
}
