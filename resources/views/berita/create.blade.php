@extends('layouts.app')

@section('title', 'Tulis Berita Baru')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Tulis Berita Baru</h1>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('berita.store') }}" method="POST">
            @csrf
            
            <div class="space-y-6">
                <!-- Informasi Berita -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2 space-y-4">
                        <div>
                            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Berita *</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-lg font-semibold"
                                placeholder="Masukkan judul berita yang menarik...">
                            @error('judul')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="konten" class="block text-sm font-medium text-gray-700">Konten Berita *</label>
                            <textarea name="konten" id="konten" rows="12" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Tulis isi berita di sini...">{{ old('konten') }}</textarea>
                            @error('konten')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Informasi Penulis & Kategori -->
                        <div class="bg-gray-50 rounded-lg p-4 space-y-4">
                            <h3 class="text-lg font-semibold text-gray-800">Informasi Berita</h3>
                            
                            <div>
                                <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis *</label>
                                <input type="text" name="penulis" id="penulis" value="{{ old('penulis', auth()->check() ? auth()->user()->name : '') }}" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div>
                                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori *</label>
                                <select name="kategori" id="kategori" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Pilih Kategori</option>
                                    <option value="Pengumuman" {{ old('kategori') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                                    <option value="Prestasi" {{ old('kategori') == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                                    <option value="Kegiatan" {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                    <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" name="is_anonymous" id="is_anonymous" value="1" 
                                    {{ old('is_anonymous') ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <label for="is_anonymous" class="ml-2 text-sm text-gray-700">
                                    Tampilkan sebagai Anonymous
                                </label>
                            </div>
                        </div>

                        <!-- Featured Image -->
                        <div class="bg-gray-50 rounded-lg p-4 space-y-4">
                            <h3 class="text-lg font-semibold text-gray-800">Gambar Berita</h3>
                            
                            <div>
                                <label for="gambar" class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                                <input type="file" name="gambar" id="gambar" 
                                    class="mt-1 block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-blue-100">
                                <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF. Maksimal 2MB.</p>
                            </div>

                            <div id="image-preview" class="hidden mt-2">
                                <img id="preview" class="w-full h-32 object-cover rounded-lg">
                            </div>
                        </div>

                        <!-- Tips Menulis -->
                        <div class="bg-blue-50 rounded-lg p-4">
                            <h4 class="font-semibold text-blue-800 mb-2">Tips Menulis Berita:</h4>
                            <ul class="text-sm text-blue-700 space-y-1">
                                <li>• Gunakan judul yang menarik</li>
                                <li>• Tulis konten yang informatif</li>
                                <li>• Sertakan gambar yang relevan</li>
                                <li>• Periksa ejaan dan tata bahasa</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-3 pt-6 border-t">
                    <a href="{{ route('berita.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition">
                        Batal
                    </a>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                        <i class="fas fa-paper-plane mr-2"></i>Publikasikan Berita
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('gambar');
    const imagePreview = document.getElementById('image-preview');
    const preview = document.getElementById('preview');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                imagePreview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview.classList.add('hidden');
        }
    });

    // Auto-resize textarea
    const textarea = document.getElementById('konten');
    textarea.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
});
</script>
@endsection