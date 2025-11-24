<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Website Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <i class="fas fa-school text-2xl"></i>
                    <a href="{{ route('home') }}" class="text-xl font-bold">Sekolah Kita</a>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('home') }}" class="hover:text-blue-200 transition">Home</a>
                    <a href="{{ route('profil.index') }}" class="hover:text-blue-200 transition">Profil</a>
                    <a href="{{ route('guru.index') }}" class="hover:text-blue-200 transition">Guru</a>
                    <a href="{{ route('siswa.index') }}" class="hover:text-blue-200 transition">Siswa</a>
                    <a href="{{ route('berita.index') }}" class="hover:text-blue-200 transition">Berita</a>
                </div>
                <div class="md:hidden">
                    <button id="menu-toggle" class="text-white">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <a href="{{ route('home') }}" class="block py-2 hover:text-blue-200">Home</a>
                <a href="{{ route('profil.index') }}" class="block py-2 hover:text-blue-200">Profil</a>
                <a href="{{ route('guru.index') }}" class="block py-2 hover:text-blue-200">Guru</a>
                <a href="{{ route('siswa.index') }}" class="block py-2 hover:text-blue-200">Siswa</a>
                <a href="{{ route('berita.index') }}" class="block py-2 hover:text-blue-200">Berita</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 Website Sekolah. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>