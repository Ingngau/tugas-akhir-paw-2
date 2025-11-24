@extends('layouts.app')

@section('title', 'Tambah Data Guru')

@section('content')
<div class="container mx-auto px-4 py-8">

    <h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Data Guru</h1>

    <div class="bg-white rounded-lg shadow-lg p-6">

        <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- DATA PRIBADI --}}
                <div class="space-y-4">

                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Data Pribadi</h3>

                    {{-- NIP --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">NIP *</label>
                        <input type="text" name="nip" value="{{ old('nip') }}" required
                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm 
                            focus:border-blue-500 focus:ring-blue-500">
                        @error('nip')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap *</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required
                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm 
                            focus:border-blue-500 focus:ring-blue-500">
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin *</label>
                        <select name="jenis_kelamin" required
                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm 
                            focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tempat & Tanggal Lahir --}}
                    <div class="grid grid-cols-2 gap-4">

                        {{-- Tempat --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tempat Lahir *</label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                                class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm 
                                focus:border-blue-500 focus:ring-blue-500">
                            @error('tempat_lahir')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tanggal --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir *</label>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm 
                                focus:border-blue-500 focus:ring-blue-500">
                            @error('tanggal_lahir')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                </div>

                {{-- DATA AKADEMIK & KONTAK --}}
                <div class="space-y-4">

                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Data Akademik & Kontak</h3>

                    {{-- Jabatan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jabatan *</label>
                        <input type="text" name="jabatan" value="{{ old('jabatan') }}" required
                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm 
                            focus:border-blue-500 focus:ring-blue-500">
                        @error('jabatan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Mata Pelajaran --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mata Pelajaran *</label>
                        <input type="text" name="mata_pelajaran" value="{{ old('mata_pelajaran') }}" required
                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm 
                            focus:border-blue-500 focus:ring-blue-500">
                        @error('mata_pelajaran')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Telepon --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nomor Telepon *</label>
                        <input type="text" name="telepon" value="{{ old('telepon') }}" required
                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm 
                            focus:border-blue-500 focus:ring-blue-500">
                        @error('telepon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm 
                            focus:border-blue-500 focus:ring-blue-500">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Foto --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Foto Guru</label>
                        <input type="file" name="foto"
                            class="mt-1 block w-full text-gray-700 
                            file:mr-4 file:py-2 file:px-4 file:rounded-md 
                            file:border-0 file:bg-blue-600 file:text-white 
                            hover:file:bg-blue-700">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG · Maksimal 2MB</p>
                        @error('foto')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- Tombol --}}
            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('guru.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                    Batal
                </a>

                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Simpan Guru
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
