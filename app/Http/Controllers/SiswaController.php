<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Fixed: gunakan pagination agar hasPages() dan links() berfungsi
        $siswas = Siswa::latest()->paginate(10);
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nisn' => 'required|string|size:10|unique:siswas,nisn',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before:today',
            'alamat' => 'required|string|max:500',
            'telepon' => 'required|string|max:15|regex:/^[0-9+\-\s()]+$/',
            'email' => 'required|email:rfc,dns|max:255|unique:siswas,email',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50',
        ]);

        Siswa::create($validated);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa): View
    {
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa): View
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa): RedirectResponse
    {
        $validated = $request->validate([
            'nisn' => 'required|string|size:10|unique:siswas,nisn,' . $siswa->id,
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before:today',
            'alamat' => 'required|string|max:500',
            'telepon' => 'required|string|max:15|regex:/^[0-9+\-\s()]+$/',
            'email' => 'required|email:rfc,dns|max:255|unique:siswas,email,' . $siswa->id,
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50',
        ]);

        $siswa->update($validated);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa): RedirectResponse
    {
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}