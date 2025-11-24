@extends('layouts.app')

@section('title', 'Edit Data Siswa - ' . $siswa->nama)

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Data Siswa</h1>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- DATA PRIBADI -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Data Pribadi</h3>

                    <!-- NISN -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">NISN *</label>
                        <input type="text" name="nisn" 
                            value="{{ old('nisn', $siswa->nisn) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('nisn') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Nama -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap *</label>
                        <input type="text" name="nama" 
                            value="{{ old('nama', $siswa->nama) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin *</label>
                        <select name="jenis_kelamin"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Tempat & Tanggal Lahir -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tempat Lahir *</label>
                            <input type="text" name="tempat_lahir"
                                value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('tempat_lahir') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir *</label>

                            @php
                                $tgl = $siswa->tanggal_lahir ? \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('Y-m-d') : '';
                            @endphp

                            <input type="date" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir', $tgl) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('tanggal_lahir') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Alamat *</label>
                        <textarea name="alamat" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('alamat', $siswa->alamat) }}</textarea>
                        @error('alamat') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- DATA AKADEMIK -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Data Akademik & Kontak</h3>

                    <!-- Kelas -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kelas *</label>
                        <select name="kelas"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Pilih Kelas</option>

                            @foreach ([
                                'X IPA 1','X IPA 2','X IPS 1','X IPS 2',
                                'XI IPA 1','XI IPA 2','XI IPS 1','XI IPS 2',
                                'XII IPA 1','XII IPA 2','XII IPS 1','XII IPS 2'
                            ] as $kelas)
                                <option value="{{ $kelas }}" 
                                    {{ old('kelas', $siswa->kelas) == $kelas ? 'selected' : '' }}>
                                    {{ $kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Jurusan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jurusan</label>
                        <select name="jurusan"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Pilih Jurusan</option>
                            <option value="IPA" {{ old('jurusan', $siswa->jurusan) == 'IPA' ? 'selected' : '' }}>IPA</option>
                            <option value="IPS" {{ old('jurusan', $siswa->jurusan) == 'IPS' ? 'selected' : '' }}>IPS</option>
                            <option value="Bahasa" {{ old('jurusan', $siswa->jurusan) == 'Bahasa' ? 'selected' : '' }}>Bahasa</option>
                        </select>
                        @error('jurusan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Telepon -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Telepon *</label>
                        <input type="text" name="telepon" 
                            value="{{ old('telepon', $siswa->telepon) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('telepon') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email *</label>
                        <input type="email" name="email"
                            value="{{ old('email', $siswa->email) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>

            </div>

            <!-- Tombol -->
            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('siswa.show', $siswa->id) }}" 
                    class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                    Batal
                </a>
                <button type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Update Siswa
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
