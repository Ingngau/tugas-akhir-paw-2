<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GuruController extends Controller
{
    public function index(): View
    {
        $gurus = Guru::latest()->paginate(10);
        return view('guru.index', compact('gurus'));
    }

    public function create(): View
    {
        return view('guru.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nip'             => 'required|string|size:18|unique:gurus,nip',
            'nama'            => 'required|string|max:255',
            'jenis_kelamin'   => 'required|in:L,P',
            'tempat_lahir'    => 'required|string|max:255',
            'tanggal_lahir'   => 'required|date',
            'alamat'          => 'nullable|string',
            'telepon'         => 'nullable|string|max:20',
            'email'           => 'required|email:rfc,dns|max:255|unique:gurus,email',
            'jabatan'         => 'required|string|max:100',
            'mata_pelajaran'  => 'required|string|max:100',
            'kelas_diampu'    => 'nullable|string|max:100',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto-guru', 'public');
        }

        Guru::create($validated);

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function show(Guru $guru): View
    {
        return view('guru.show', compact('guru'));
    }

    public function edit(Guru $guru): View
    {
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru): RedirectResponse
    {
        $validated = $request->validate([
            'nip'             => 'required|string|size:18|unique:gurus,nip,' . $guru->id,
            'nama'            => 'required|string|max:255',
            'jenis_kelamin'   => 'required|in:L,P',
            'tempat_lahir'    => 'required|string|max:255',
            'tanggal_lahir'   => 'required|date',
            'alamat'          => 'nullable|string',
            'telepon'         => 'nullable|string|max:20',
            'email'           => 'required|email:rfc,dns|max:255|unique:gurus,email,' . $guru->id,
            'jabatan'         => 'required|string|max:100',
            'mata_pelajaran'  => 'required|string|max:100',
            'kelas_diampu'    => 'nullable|string|max:100',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update foto jika upload baru
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto-guru', 'public');
        }

        $guru->update($validated);

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru): RedirectResponse
    {
        $guru->delete();

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}
