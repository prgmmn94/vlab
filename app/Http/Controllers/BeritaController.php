<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    private $beritaData = [
        [
            'judul' => 'Open Recruitment LabMamen 2026',
            'slug' => 'praktikum-manajemen-2026',
            'gambar' => 'berita1.png',
            'tanggal' => '5 Februari 2026',
            'excerpt' => 'Praktikum berjalan lancar dengan partisipasi aktif mahasiswa...',
            'isi' => 'Kegiatan praktikum tahun ini berjalan sangat baik. Mahasiswa mengikuti seluruh rangkaian kegiatan dengan antusias...'
        ],
        [
            'judul' => 'Pelatihan Asisten Laboratorium',
            'slug' => 'pelatihan-asisten-lab',
            'gambar' => 'berita2.jpg',
            'tanggal' => '20 Januari 2026',
            'excerpt' => 'Pelatihan ini bertujuan meningkatkan kualitas asisten laboratorium...',
            'isi' => 'Pelatihan asisten laboratorium dilakukan selama dua hari penuh dengan berbagai materi teknis dan softskill...'
        ],
        [
            'judul' => 'Workshop Manajemen Proyek',
            'slug' => 'workshop-manajemen-proyek',
            'gambar' => 'berita3.jpg',
            'tanggal' => '10 Januari 2026',
            'excerpt' => 'Workshop ini menghadirkan pemateri dari industri profesional...',
            'isi' => 'Workshop manajemen proyek memberikan wawasan baru kepada mahasiswa mengenai pengelolaan proyek secara nyata...'
        ],
    ];

    // 🔹 LIST BERITA
    public function index()
    {
        return view('user.berita', [   // ✅ SESUAI FOLDER
            'beritaData' => $this->beritaData
        ]);
    }

    // 🔹 DETAIL BERITA
    public function detail($slug)
    {
        $berita = collect($this->beritaData)->firstWhere('slug', $slug);

        if (!$berita) {
            abort(404);
        }

        $beritaLainnya = collect($this->beritaData)
            ->where('slug', '!=', $slug)
            ->values()
            ->take(2);

        return view('user.berita_detail', compact('berita', 'beritaLainnya')); // ✅ SESUAI FOLDER
    }
}
