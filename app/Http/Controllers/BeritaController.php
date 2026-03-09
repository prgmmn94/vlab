<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
{
    $beritaData = Berita::all();

    return view('home.berita', [
        'beritaData' => $beritaData
    ]);
}

    public function detail($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();

        $beritaLainnya = Berita::where('slug','!=',$slug)
            ->latest()
            ->take(2)
            ->get();

        return view('home.berita_detail', compact('berita','beritaLainnya'));
    }
}