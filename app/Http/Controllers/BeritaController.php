<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $beritas = Berita::latest()->paginate(10);
        return view('berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'penulis' => 'required|string|max:100',
            'kategori' => 'required|string|max:100',
            'is_anonymous' => 'nullable|boolean',
        ]);

        // Override penulis jika anonim dipilih
        if ($request->boolean('is_anonymous')) {
            $validated['penulis'] = 'Anonymous';
        }

        Berita::create($validated);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita): View
    {
        // Tambah jumlah views
        $berita->increment('views');

        // Ambil berita terkait berdasarkan kategori
        $relatedBerita = Berita::where('kategori', $berita->kategori)
            ->where('id', '!=', $berita->id)
            ->latest()
            ->take(2)
            ->get();

        return view('berita.show', compact('berita', 'relatedBerita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita): View
    {
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'penulis' => 'required|string|max:100',
            'kategori' => 'required|string|max:100',
            'is_anonymous' => 'nullable|boolean',
        ]);

        // Override penulis jika anonim dipilih
        if ($request->boolean('is_anonymous')) {
            $validated['penulis'] = 'Anonymous';
        }

        $berita->update($validated);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita): RedirectResponse
    {
        $berita->delete();

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    /**
     * Filter berita berdasarkan kategori.
     */
    public function byKategori(string $kategori): View
    {
        $beritas = Berita::where('kategori', $kategori)->latest()->paginate(10);
        $kategoriName = ucfirst($kategori);

        return view('berita.kategori', compact('beritas', 'kategoriName'));
    }
}
