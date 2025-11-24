<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    public function index() { return Ekstrakurikuler::all(); }
    public function store(Request $r) { return Ekstrakurikuler::create($r->all()); }
    public function show(Ekstrakurikuler $ekskul) { return $ekskul; }
    public function update(Request $r, Ekstrakurikuler $ekskul) { $ekskul->update($r->all()); return $ekskul; }
    public function destroy(Ekstrakurikuler $ekskul) { $ekskul->delete(); return ['message'=>'Deleted']; }
}
