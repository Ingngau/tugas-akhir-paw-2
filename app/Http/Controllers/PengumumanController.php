<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index() {
        return Pengumuman::all();
}


    public function store(Request $request) {
        return Pengumuman::create($request->all());
}


    public function show(Pengumuman $pengumuman) {
        return $pengumuman;
}


    public function update(Request $request, Pengumuman $pengumuman) {
        $pengumuman->update($request->all());
        return $pengumuman;
}


    public function destroy(Pengumuman $pengumuman) {
        $pengumuman->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
