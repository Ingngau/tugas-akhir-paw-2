<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profil;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Profil Sekolah
        Profil::create([
            'nama_sekolah' => 'SMA Negeri 1 Jakarta',
            'npsn' => '20200101',
            'alamat' => 'Jl. Pendidikan No. 123, Jakarta Pusat',
            'telepon' => '(021) 1234567',
            'email' => 'info@sman1jkt.sch.id',
            'website' => 'www.sman1jkt.sch.id',
            'sejarah' => 'SMA Negeri 1 Jakarta didirikan pada tahun 1950 dan telah menjadi salah satu sekolah terbaik di Indonesia...',
            'visi' => 'Menjadi sekolah unggulan yang menghasilkan lulusan berkarakter, berprestasi, dan berwawasan global',
            'misi' => '1. Menyelenggarakan pendidikan berkualitas. 2. Mengembangkan potensi siswa secara optimal. 3. Membangun karakter yang kuat.',
        ]);

        // Data Guru
        Guru::create([
            'nip' => '196501011987031001',
            'nama' => 'Dr. Surya Adi, M.Pd.',
            'jenis_kelamin' => 'Laki-laki',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1965-01-01',
            'alamat' => 'Jl. Merdeka No. 45, Jakarta',
            'telepon' => '081234567890',
            'email' => 'surya.adi@sman1jkt.sch.id',
            'jabatan' => 'Kepala Sekolah',
            'mata_pelajaran' => '-',
            'kelas_diampu' => '-',
        ]);

        Guru::create([
            'nip' => '197003151992122001',
            'nama' => 'Diana Sari, S.Pd.',
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '1970-03-15',
            'alamat' => 'Jl. Cendrawasih No. 12, Jakarta',
            'telepon' => '081298765432',
            'email' => 'diana.sari@sman1jkt.sch.id',
            'jabatan' => 'Guru Matematika',
            'mata_pelajaran' => 'Matematika',
            'kelas_diampu' => 'X, XI, XII',
        ]);

        // Data Siswa
        Siswa::create([
            'nisn' => '0061234567',
            'nama' => 'Ahmad Rizki',
            'jenis_kelamin' => 'Laki-laki',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2007-05-15',
            'alamat' => 'Jl. Melati No. 23, Jakarta',
            'telepon' => '081311223344',
            'email' => 'ahmad.rizki@sman1jkt.sch.id',
            'kelas' => 'X IPA 1',
            'jurusan' => 'IPA',
        ]);

        Siswa::create([
            'nisn' => '0067654321',
            'nama' => 'Sari Dewi',
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2007-08-20',
            'alamat' => 'Jl. Mawar No. 56, Jakarta',
            'telepon' => '081322334455',
            'email' => 'sari.dewi@sman1jkt.sch.id',
            'kelas' => 'X IPS 1',
            'jurusan' => 'IPS',
        ]);

        // Data Berita
        Berita::create([
            'judul' => 'Penerimaan Peserta Didik Baru 2024',
            'konten' => 'Diberitahukan kepada masyarakat bahwa Penerimaan Peserta Didik Baru (PPDB) SMA Negeri 1 Jakarta Tahun Ajaran 2024/2025 akan dibuka mulai tanggal 1 Juni 2024...',
            'penulis' => 'Admin',
            'kategori' => 'Pengumuman',
            'is_anonymous' => false,
        ]);

        Berita::create([
            'judul' => 'Siswa SMA Negeri 1 Juara Olimpiade Matematika',
            'konten' => 'Siswa kami, Ahmad Rizki dari kelas X IPA 1 berhasil meraih medali emas dalam Olimpiade Matematika Nasional 2024...',
            'penulis' => 'Guru Matematika',
            'kategori' => 'Prestasi',
            'is_anonymous' => false,
        ]);
    }
}