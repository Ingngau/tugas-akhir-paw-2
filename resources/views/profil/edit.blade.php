@extends('layouts.app')

@section('title', 'Edit Profil Sekolah')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Profil Sekolah</h1>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('profil.update', $profil) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Informasi Dasar -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Informasi Dasar</h3>
                    
                    <div>
                        <label for="nama_sekolah" class="block text-sm font-medium text-gray-700">Nama Sekolah *</label>
                        <input type="text" name="nama_sekolah" id="nama_sekolah" value="{{ old('nama_sekolah', $profil->nama_sekolah) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="npsn" class="block text-sm font-medium text-gray-700">NPSN *</label>
                        <input type="text" name="npsn" id="npsn" value="{{ old('npsn', $profil->npsn) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat *</label>
                        <textarea name="alamat" id="alamat" rows="3" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('alamat', $profil->alamat) }}</textarea>
                    </div>

                    <div>
                        <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon *</label>
                        <input type="text" name="telepon" id="telepon" value="{{ old('telepon', $profil->telepon) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $profil->email) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                        <input type="url" name="website" id="website" value="{{ old('website', $profil->website) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Visi, Misi, Sejarah -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Profil Akademik</h3>
                    
                    <div>
                        <label for="sejarah" class="block text-sm font-medium text-gray-700">Sejarah Sekolah *</label>
                        <textarea name="sejarah" id="sejarah" rows="4" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('sejarah', $profil->sejarah) }}</textarea>
                    </div>

                    <div>
                        <label for="visi" class="block text-sm font-medium text-gray-700">Visi *</label>
                        <textarea name="visi" id="visi" rows="3" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('visi', $profil->visi) }}</textarea>
                    </div>

                    <div>
                        <label for="misi" class="block text-sm font-medium text-gray-700">Misi *</label>
                        <textarea name="misi" id="misi" rows="4" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('misi', $profil->misi) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('profil.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                    Batal
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Update Profil
                </button>
            </div>
        </form>
    </div>
</div>
@endsection