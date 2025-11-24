<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::first();
        return view('profil.index', compact('profil'));
    }

    public function create()
    {
        return view('profil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'npsn' => 'required|unique:profils',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        Profil::create($request->all());

        return redirect()->route('profil.index')
            ->with('success', 'Profil sekolah berhasil dibuat');
    }

    public function show(Profil $profil)
    {
        return view('profil.show', compact('profil'));
    }

    public function edit(Profil $profil)
    {
        return view('profil.edit', compact('profil'));
    }

    public function update(Request $request, Profil $profil)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'npsn' => 'required|unique:profils,npsn,' . $profil->id,
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $profil->update($request->all());

        return redirect()->route('profil.index')
            ->with('success', 'Profil sekolah berhasil diperbarui');
    }

    public function destroy(Profil $profil)
    {
        $profil->delete();
        return redirect()->route('profil.index')
            ->with('success', 'Profil sekolah berhasil dihapus');
    }
}