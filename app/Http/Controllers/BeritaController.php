<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    private $beritaData = [
        [
            'judul' => 'Open Recruitment LABMAMEN 2026',
            'slug' => 'praktikum-manajemen-2026',
            'gambar' => 'berita1.png',
            'tanggal' => '5 Februari 2026',
            'excerpt' => 'Mengapa Bergabung dengan Labmamen? Karena kami lebih dari sekadar komunitas. Kami adalah keluarga yang bertumbuh bersama, berbagi motivasi, dan meraih cita-cita tanpa pamrih. Labmamen adalah ruang untuk berkembang, berkontribusi, dan menemukan pengalaman yang tak terlupakan.',
            'isi' => 'Kegiatan praktikum tahun ini berjalan sangat baik. Mahasiswa mengikuti seluruh rangkaian kegiatan dengan antusias...'
        ],
        [
            'judul' => 'Training Asisten LABMAMEN',
            'slug' => 'pelatihan-asisten-lab',
            'gambar' => 'berita2.jpg',
            'tanggal' => '20 Januari 2026',
            'excerpt' => 'Pelatihan ini bertujuan meningkatkan kualitas asisten laboratorium...',
            'isi' => 'Pelatihan asisten laboratorium dilakukan selama dua hari penuh dengan berbagai materi teknis dan softskill...'
        ],
        [
            'judul' => 'Buka Bersama LABMAMEN 2026',
            'slug' => 'bukber labmamen',
            'gambar' => 'berita3.jpeg',
            'tanggal' => '10 Januari 2026',
            'excerpt' => 'Lab Manajemen Menengah mengadakan kegiatan Buka Puasa Bersama sebagai momen kebersamaan untuk mempererat silaturahmi antara asisten, staf, dan alumni',
            'isi' => 'WBuka Puasa Bersama (Bukber) Laboratorium Manajemen Menengah dilaksanakan pada 7 Maret 2026 pukul 16.00 dalam suasana hangat dan penuh kebersamaan. Kegiatan ini menjadi momen istimewa yang mempertemukan asisten, staf, dan mahasiswa untuk mempererat silaturahmi di luar aktivitas akademik. Acara diisi dengan ramah tamah, tausiyah singkat, serta berbuka dan makan bersama, sehingga menghadirkan kebersamaan yang sederhana namun penuh makna.'
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
