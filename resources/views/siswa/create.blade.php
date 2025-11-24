@extends('layouts.app')

@section('title', 'Tambah Data Siswa')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Data Siswa</h1>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- Data Pribadi --}}
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Data Pribadi</h3>

                    {{-- NISN --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">NISN *</label>
                        <input type="text" name="nisn" value="{{ old('nisn') }}" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('nisn')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap *</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('nama')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin *</label>
                        <select name="jenis_kelamin" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tempat & Tanggal Lahir --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tempat Lahir *</label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('tempat_lahir')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir *</label>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('tanggal_lahir')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Alamat *</label>
                        <textarea name="alamat" rows="3" required
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Foto --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Foto Siswa (opsional)</label>
                        <input type="file" name="foto" class="mt-1 block w-full text-sm">
                        @error('foto')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Data Akademik & Kontak --}}
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Data Akademik & Kontak</h3>

                    {{-- Kelas --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kelas *</label>
                        <select name="kelas" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="">Pilih Kelas</option>
                            @foreach([
                                'X IPA 1','X IPA 2','X IPS 1','X IPS 2',
                                'XI IPA 1','XI IPA 2','XI IPS 1','XI IPS 2',
                                'XII IPA 1','XII IPA 2','XII IPS 1','XII IPS 2'
                            ] as $kelas)
                                <option value="{{ $kelas }}" {{ old('kelas') == $kelas ? 'selected' : '' }}>
                                    {{ $kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jurusan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jurusan</label>
                        <select name="jurusan"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="">Pilih Jurusan</option>
                            <option value="IPA" {{ old('jurusan') == 'IPA' ? 'selected' : '' }}>IPA</option>
                            <option value="IPS" {{ old('jurusan') == 'IPS' ? 'selected' : '' }}>IPS</option>
                            <option value="Bahasa" {{ old('jurusan') == 'Bahasa' ? 'selected' : '' }}>Bahasa</option>
                        </select>
                        @error('jurusan')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Telepon --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Telepon *</label>
                        <input type="text" name="telepon" value="{{ old('telepon') }}" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('telepon')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('email')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- Tombol --}}
            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('siswa.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                    Batal
                </a>

                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Simpan Siswa
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
