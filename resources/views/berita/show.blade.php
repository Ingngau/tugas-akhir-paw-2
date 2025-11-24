@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-5xl mx-auto">

        <!-- Breadcrumb -->
        <nav class="flex mb-6 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 flex items-center">
                        <i class="fas fa-home mr-1"></i> Home
                    </a>
                </li>

                <li class="flex items-center">
                    <i class="fas fa-chevron-right text-gray-400 mx-1"></i>
                    <a href="{{ route('berita.index') }}" class="text-gray-700 hover:text-blue-600">
                        Berita
                    </a>
                </li>

                <li class="flex items-center">
                    <i class="fas fa-chevron-right text-gray-400 mx-1"></i>
                    <span class="font-medium text-gray-500">
                        {{ Str::limit($berita->judul, 40) }}
                    </span>
                </li>
            </ol>
        </nav>

        <!-- Artikel -->
        <article class="bg-white rounded-lg shadow-lg overflow-hidden">

            <!-- Gambar -->
            @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}"
                     class="w-full h-72 md:h-96 object-cover"
                     alt="{{ $berita->judul }}">
            @else
                <div class="w-full h-72 md:h-96 bg-gradient-to-br from-blue-600 to-purple-700 flex items-center justify-center">
                    <i class="fas fa-newspaper text-white text-7xl"></i>
                </div>
            @endif

            <div class="p-6 md:p-8">

                <!-- Meta -->
                <div class="flex justify-between items-start mb-4">
                    <div class="space-x-3 flex items-center flex-wrap">

                        <!-- Badge kategori -->
                        <span class="px-3 py-1 text-xs font-semibold rounded-full
                            @if($berita->kategori == 'Pengumuman') bg-blue-100 text-blue-700 @endif
                            @if($berita->kategori == 'Kegiatan') bg-yellow-100 text-yellow-700 @endif
                            @if($berita->kategori == 'Prestasi') bg-green-100 text-green-700 @endif
                            @if($berita->kategori == 'Lainnya') bg-gray-200 text-gray-700 @endif
                        ">
                            {{ $berita->kategori }}
                        </span>

                        <span class="text-gray-500 text-sm flex items-center">
                            <i class="far fa-clock mr-1"></i>
                            {{ $berita->created_at->format('d F Y') }}
                        </span>

                        <span class="text-gray-500 text-sm flex items-center">
                            <i class="far fa-eye mr-1"></i>
                            {{ $berita->views }} dilihat
                        </span>
                    </div>

                    <!-- Edit + Delete -->
                    <div class="flex space-x-3">
                        <a href="{{ route('berita.edit', $berita) }}" class="text-green-600 hover:text-green-800">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('berita.destroy', $berita) }}" 
                              method="POST"
                              onsubmit="return confirm('Hapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Judul -->
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 leading-snug mb-4">
                    {{ $berita->judul }}
                </h1>

                <!-- Penulis -->
                <div class="flex items-center p-4 bg-gray-50 rounded-lg mb-6">
                    <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">{{ $berita->penulis }}</p>
                        <p class="text-sm text-gray-500">
                            Dipublikasikan pada {{ $berita->created_at->format('d F Y · H:i') }}
                        </p>
                    </div>
                </div>

                <!-- Konten -->
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($berita->konten)) !!}
                </div>

                <!-- Footer -->
                <div class="mt-10 pt-5 border-t border-gray-200 flex justify-between items-center">
                    <a href="{{ route('berita.index') }}"
                       class="text-blue-600 hover:text-blue-800 flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>

                    <button class="text-gray-500 hover:text-blue-500">
                        <i class="fas fa-share-alt"></i>
                    </button>
                </div>

            </div>
        </article>

        <!-- Related Berita -->
        @if($relatedBerita->count() > 0)
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Berita Terkait</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($relatedBerita as $related)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="p-5">
                        <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-700">
                            {{ $related->kategori }}
                        </span>

                        <h3 class="font-semibold text-lg mt-3 mb-2 line-clamp-2">
                            <a href="{{ route('berita.show', $related) }}"
                               class="hover:text-blue-600">
                                {{ $related->judul }}
                            </a>
                        </h3>

                        <div class="text-sm text-gray-500 flex justify-between">
                            <span>{{ $related->created_at->format('d M Y') }}</span>
                            <span><i class="fas fa-eye mr-1"></i>{{ $related->views }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection
