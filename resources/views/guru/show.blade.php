<!-- resources/views/guru/show.blade.php -->
@extends('layouts.app')

@section('title', 'Detail Guru')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow rounded-xl p-6">
        <h2 class="text-2xl font-bold mb-4">Detail Guru</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div><strong>NIP:</strong> {{ $guru->nip }}</div>
            <div><strong>Nama:</strong> {{ $guru->nama }}</div>
            <div><strong>Jenis Kelamin:</strong> {{ $guru->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
            <div><strong>Email:</strong> {{ $guru->email }}</div>
            <div><strong>Jabatan:</strong> {{ $guru->jabatan }}</div>
            <div><strong>Mata Pelajaran:</strong> {{ $guru->mata_pelajaran }}</div>
        </div>

        <div class="mt-6 flex gap-3">
            <a href="{{ route('guru.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg">Kembali</a>
            <a href="{{ route('guru.edit', $guru->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Edit</a>
        </div>
    </div>
</div>
@endsection


