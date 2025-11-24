@extends('layouts.app')

@section('title', 'Edit Data Guru')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow rounded-xl p-6">
        <h2 class="text-2xl font-bold mb-4">Edit Data Guru</h2>

        <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- NIP --}}
            <div>
                <label class="font-semibold">NIP *</label>
                <input type="text" name="nip" value="{{ old('nip', $guru->nip) }}"
                    class="w-full border rounded p-2">
                @error('nip') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            {{-- Nama --}}
            <div>
                <label class="font-semibold">Nama Lengkap *</label>
                <input type="text" name="nama" value="{{ old('nama', $guru->nama) }}"
                    class="w-full border rounded p-2">
                @error('nama') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            {{-- Jenis Kelamin --}}
            <div>
                <label class="font-semibold">Jenis Kelamin *</label>
                <select name="jenis_kelamin" class="w-full border rounded p-2">
                    <option value="L" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            {{-- Tempat Lahir --}}
            <div>
                <label class="font-semibold">Tempat Lahir *</label>
                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $guru->tempat_lahir) }}"
                    class="w-full border rounded p-2">
                @error('tempat_lahir') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            {{-- Tanggal Lahir --}}
            <div>
                <label class="font-semibold">Tanggal Lahir *</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $guru->tanggal_lahir) }}"
                    class="w-full border rounded p-2">
                @error('tanggal_lahir') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            {{-- Alamat --}}
            <div>
                <label class="font-semibold">Alamat</label>
                <textarea name="alamat" class="w-full border rounded p-2" rows="3">{{ old('alamat', $guru->alamat) }}</textarea>
                @error('alamat') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            {{-- Telepon --}}
            <div>
                <label class="font-semibold">Nomor Telepon</label>
                <input type="text" name="telepon" value="{{ old('telepon', $guru->telepon) }}"
                    class="w-full border rounded p-2">
                @error('telepon') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="font-semibold">Email *</label>
                <input type="email" name="email" value="{{ old('email', $guru->email) }}"
                    class="w-full border rounded p-2">
                @error('email') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            {{-- Jabatan --}}
            <div>
                <label class="font-semibold">Jabatan *</label>
                <input type="text" name="jabatan" value="{{ old('jabatan', $guru->jabatan) }}"
                    class="w-full border rounded p-2">
                @error('jabatan') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            {{-- Mata Pelajaran --}}
            <div>
                <label class="font-semibold">Mata Pelajaran *</label>
                <input type="text" name="mata_pelajaran" value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}"
                    class="w-full border rounded p-2">
                @error('mata_pelajaran') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            {{-- Kelas Diampu --}}
            <div>
                <label class="font-semibold">Kelas Diampu</label>
                <input type="text" name="kelas_diampu" value="{{ old('kelas_diampu', $guru->kelas_diampu) }}"
                    class="w-full border rounded p-2">
                @error('kelas_diampu') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            {{-- Foto --}}
            <div>
                <label class="font-semibold">Foto Guru</label>
                <input type="file" name="foto" class="w-full border rounded p-2">

                @if ($guru->foto)
                    <p class="text-sm mt-2">Foto saat ini:</p>
                    <img src="{{ asset('storage/' . $guru->foto) }}" class="w-24 h-24 rounded object-cover border">
                @endif

                @error('foto') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex gap-3 mt-4">
                <a href="{{ route('guru.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan Perubahan</button>
            </div>

        </form>
    </div>
</div>
@endsection
