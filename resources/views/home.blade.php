@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Hero Section -->
    <div class="bg-blue-600 text-white rounded-lg p-8 mb-8 text-center">
        <h1 class="text-4xl font-bold mb-4">Selamat Datang di {{ $profil->nama_sekolah ?? 'Sekolah Kita' }}</h1>
        <p class="text-xl mb-6">Membangun Generasi Berkarakter dan Berprestasi</p>
        <a href="{{ route('profil.index') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-100 transition">
            Kenali Sekolah Kami
        </a>
    </div>

    <!-- Stats Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <i class="fas fa-chalkboard-teacher text-4xl text-blue-600 mb-4"></i>
            <h3 class="text-2xl font-bold text-gray-800">{{ $guruCount }}</h3>
            <p class="text-gray-600">Guru Berpengalaman</p>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <i class="fas fa-user-graduate text-4xl text-green-600 mb-4"></i>
            <h3 class="text-2xl font-bold text-gray-800">{{ $siswaCount }}</h3>
            <p class="text-gray-600">Siswa Aktif</p>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <i class="fas fa-trophy text-4xl text-yellow-600 mb-4"></i>
            <h3 class="text-2xl font-bold text-gray-800">50+</h3>
            <p class="text-gray-600">Prestasi</p>
        </div>
    </div>

    <!-- Latest News -->
    <div class="mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Berita Terbaru</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($beritaTerbaru as $berita)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $berita->judul }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($berita->konten, 100) }}</p>
                    <div class="flex justify-between items-center text-sm text-gray-500">
                        <span>Oleh: {{ $berita->penulis }}</span>
                        <span>{{ $berita->created_at->format('d M Y') }}</span>
                    </div>
                    <a href="{{ route('berita.show', $berita) }}" class="inline-block mt-4 text-blue-600 hover:text-blue-800">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Quick Links -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="{{ route('guru.index') }}" class="bg-white rounded-lg shadow p-4 text-center hover:shadow-lg transition">
            <i class="fas fa-users text-2xl text-blue-600 mb-2"></i>
            <p class="font-semibold">Data Guru</p>
        </a>
        <a href="{{ route('siswa.index') }}" class="bg-white rounded-lg shadow p-4 text-center hover:shadow-lg transition">
            <i class="fas fa-graduation-cap text-2xl text-green-600 mb-2"></i>
            <p class="font-semibold">Data Siswa</p>
        </a>
        <a href="{{ route('berita.index') }}" class="bg-white rounded-lg shadow p-4 text-center hover:shadow-lg transition">
            <i class="fas fa-newspaper text-2xl text-red-600 mb-2"></i>
            <p class="font-semibold">Berita</p>
        </a>
        <a href="{{ route('profil.index') }}" class="bg-white rounded-lg shadow p-4 text-center hover:shadow-lg transition">
            <i class="fas fa-info-circle text-2xl text-purple-600 mb-2"></i>
            <p class="font-semibold">Profil</p>
        </a>
    </div>
</div>
@endsection