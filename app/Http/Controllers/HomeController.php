<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profil = Profil::first();
        $guruCount = Guru::count();
        $siswaCount = Siswa::count();
        $beritaTerbaru = Berita::latest()->take(3)->get();

        return view('home', compact('profil', 'guruCount', 'siswaCount', 'beritaTerbaru'));
    }
}