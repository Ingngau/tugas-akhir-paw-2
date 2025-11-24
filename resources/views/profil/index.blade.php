@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Profil Sekolah</h1>
        @if($profil)
            <a href="{{ route('profil.edit', $profil) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-edit mr-2"></i>Edit Profil
            </a>
        @else
            <a href="{{ route('profil.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-plus mr-2"></i>Tambah Profil
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($profil)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Header Profil -->
            <div class="bg-blue-600 text-white p-6">
                <div class="flex items-center space-x-4">
                    @if($profil->logo)
                        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Sekolah" class="w-20 h-20 rounded-full border-4 border-white">
                    @else
                        <div class="w-20 h-20 bg-blue-500 rounded-full flex items-center justify-center border-4 border-white">
                            <i class="fas fa-school text-2xl"></i>
                        </div>
                    @endif
                    <div>
                        <h1 class="text-3xl font-bold">{{ $profil->nama_sekolah }}</h1>
                        <p class="text-blue-100">{{ $profil->alamat }}</p>
                    </div>
                </div>
            </div>

            <!-- Informasi Sekolah -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Informasi Sekolah</h3>
                        <div class="space-y-2">
                            <div class="flex">
                                <span class="font-semibold text-gray-700 w-32">NPSN:</span>
                                <span>{{ $profil->npsn }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-semibold text-gray-700 w-32">Telepon:</span>
                                <span>{{ $profil->telepon }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-semibold text-gray-700 w-32">Email:</span>
                                <span>{{ $profil->email }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-semibold text-gray-700 w-32">Website:</span>
                                <span>{{ $profil->website ?? '-' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Kontak</h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <i class="fas fa-phone text-blue-600 w-6"></i>
                                <span class="ml-2">{{ $profil->telepon }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-blue-600 w-6"></i>
                                <span class="ml-2">{{ $profil->email }}</span>
                            </div>
                            @if($profil->website)
                            <div class="flex items-center">
                                <i class="fas fa-globe text-blue-600 w-6"></i>
                                <span class="ml-2">{{ $profil->website }}</span>
                            </div>
                            @endif
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-blue-600 w-6"></i>
                                <span class="ml-2">{{ $profil->alamat }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sejarah -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4">Sejarah Sekolah</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $profil->sejarah }}</p>
                </div>

                <!-- Visi & Misi -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4">Visi</h3>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <p class="text-gray-700 italic">{{ $profil->visi }}</p>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4">Misi</h3>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <p class="text-gray-700 whitespace-pre-line">{{ $profil->misi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded">
            <p>Profil sekolah belum ditambahkan. <a href="{{ route('profil.create') }}" class="font-semibold underline">Klik di sini untuk menambahkan profil sekolah.</a></p>
        </div>
    @endif
</div>
@endsection