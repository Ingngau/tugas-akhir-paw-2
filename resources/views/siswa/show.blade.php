@extends('layouts.app')

@section('title', 'Detail Siswa - ' . $siswa->nama)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Detail Siswa</h1>
        <div class="flex space-x-2">
            <a href="{{ route('siswa.edit', $siswa) }}" class="bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
            <a href="{{ route('siswa.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white p-6">
            <div class="flex items-center space-x-6">
                @if($siswa->foto)
                    <img src="{{ asset('storage/' . $siswa->foto) }}" alt="{{ $siswa->nama }}" 
                         class="w-24 h-24 rounded-full border-4 border-white object-cover">
                @else
                    <div class="w-24 h-24 bg-blue-500 rounded-full flex items-center justify-center border-4 border-white">
                        <i class="fas fa-user-graduate text-3xl"></i>
                    </div>
                @endif
                <div>
                    <h1 class="text-3xl font-bold">{{ $siswa->nama }}</h1>
                    <p class="text-blue-100">NISN: {{ $siswa->nisn }} | {{ $siswa->kelas }}</p>
                    <div class="flex space-x-4 mt-2">
                        <span class="bg-blue-500 px-3 py-1 rounded-full text-sm">{{ $siswa->jurusan ?? 'Umum' }}</span>
                        <span class="bg-green-500 px-3 py-1 rounded-full text-sm">{{ $siswa->jenis_kelamin }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Data Pribadi -->
                <div class="space-y-6">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Data Pribadi</h3>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between border-b pb-2">
                            <span class="font-semibold text-gray-700">Tempat, Tanggal Lahir:</span>
                            <span>{{ $siswa->tempat_lahir }}, {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d F Y') }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="font-semibold text-gray-700">Usia:</span>
                            <span>{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->age }} tahun</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="font-semibold text-gray-700">Jenis Kelamin:</span>
                            <span>{{ $siswa->jenis_kelamin }}</span>
                        </div>
                        <div class="border-b pb-2">
                            <span class="font-semibold text-gray-700">Alamat:</span>
                            <p class="mt-1 text-gray-600">{{ $siswa->alamat }}</p>
                        </div>
                    </div>
                </div>

                <!-- Data Akademik & Kontak -->
                <div class="space-y-6">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Data Akademik & Kontak</h3>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between border-b pb-2">
                            <span class="font-semibold text-gray-700">Kelas:</span>
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">{{ $siswa->kelas }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="font-semibold text-gray-700">Jurusan:</span>
                            <span>
                                @if($siswa->jurusan)
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">{{ $siswa->jurusan }}</span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="font-semibold text-gray-700">Telepon:</span>
                            <span>{{ $siswa->telepon }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="font-semibold text-gray-700">Email:</span>
                            <span>{{ $siswa->email }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="font-semibold text-gray-700">Tanggal Daftar:</span>
                            <span>{{ $siswa->created_at->format('d F Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection