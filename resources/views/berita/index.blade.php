@extends('layouts.app')

@section('title', 'Berita Sekolah')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Berita Sekolah</h1>
        <a href="{{ route('berita.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Tulis Berita
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filter Kategori -->
    <div class="bg-white rounded-lg shadow p-4 mb-6">
        <div class="flex flex-wrap gap-2">
            <button class="filter-btn px-4 py-2 rounded-full bg-blue-600 text-white" data-category="">
                Semua Berita
            </button>
            <button class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300" data-category="Pengumuman">
                Pengumuman
            </button>
            <button class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300" data-category="Prestasi">
                Prestasi
            </button>
            <button class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300" data-category="Kegiatan">
                Kegiatan
            </button>
            <button class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300" data-category="Lainnya">
                Lainnya
            </button>
        </div>
    </div>

    <!-- Daftar Berita -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="berita-container">
        @forelse($beritas as $berita)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden berita-card" data-category="{{ $berita->kategori }}">
            @if($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" 
                 class="w-full h-48 object-cover">
            @else
            <div class="w-full h-48 bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                <i class="fas fa-newspaper text-white text-4xl"></i>
            </div>
            @endif
            
            <div class="p-6">
                <div class="flex justify-between items-start mb-2">
                    <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full 
                                {{ $berita->kategori == 'Pengumuman' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $berita->kategori == 'Prestasi' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $berita->kategori == 'Kegiatan' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $berita->kategori == 'Lainnya' ? 'bg-gray-100 text-gray-800' : '' }}">
                        {{ $berita->kategori }}
                    </span>
                    <span class="text-sm text-gray-500">{{ $berita->created_at->format('d M Y') }}</span>
                </div>
                
                <h3 class="text-xl font-semibold text-gray-800 mb-3 line-clamp-2">{{ $berita->judul }}</h3>
                <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit(strip_tags($berita->konten), 120) }}</p>
                
                <div class="flex justify-between items-center text-sm text-gray-500">
                    <span>Oleh: {{ $berita->penulis }}</span>
                    <span><i class="fas fa-eye mr-1"></i>{{ $berita->views }}</span>
                </div>
                
                <div class="mt-4 flex justify-between items-center">
                    <a href="{{ route('berita.show', $berita) }}" 
                       class="text-blue-600 hover:text-blue-800 font-semibold">
                        Baca Selengkapnya →
                    </a>
                    <div class="flex space-x-2">
                        <a href="{{ route('berita.edit', $berita) }}" class="text-green-600 hover:text-green-800">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('berita.destroy', $berita) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12">
            <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-500 mb-2">Belum ada berita</h3>
            <p class="text-gray-400 mb-4">Mulai menulis berita pertama untuk sekolah Anda</p>
            <a href="{{ route('berita.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                Tulis Berita Pertama
            </a>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($beritas->hasPages())
    <div class="mt-8">
        {{ $beritas->links() }}
    </div>
    @endif
</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const beritaCards = document.querySelectorAll('.berita-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.dataset.category;
            
            // Update active button
            filterButtons.forEach(btn => {
                btn.classList.remove('bg-blue-600', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
            });
            this.classList.remove('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
            this.classList.add('bg-blue-600', 'text-white');

            // Filter cards
            beritaCards.forEach(card => {
                if (category === '' || card.dataset.category === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endsection