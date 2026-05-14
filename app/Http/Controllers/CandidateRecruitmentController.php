<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use App\Models\RecruitmentPeriod;
use Illuminate\Http\Request;

class CandidateRecruitmentController extends Controller
{
    public function index()
    {
        // Ambil periode yang AKTIF saja
        $recruitmentPeriod = RecruitmentPeriod::where('is_active', true)->first();

        // Jika tidak ada periode aktif, redirect dengan pesan
        if (!$recruitmentPeriod) {
            return view('home.candidate_recruitments.closed');
        }

        // Langsung ke form create dengan periode aktif
        return view('home.candidate_recruitments.create', compact('recruitmentPeriod'));
    }

    public function store(Request $request)
    {
        // Ambil periode yang AKTIF saja
        $recruitmentPeriod = RecruitmentPeriod::where('is_active', true)->first();

        if (!$recruitmentPeriod) {
            return redirect()->route('candidate.recruitments.index')
                ->with('error', 'Belum ada periode rekrutmen yang dibuka.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|size:8|unique:recruitments,npm',
            'email' => 'required|email|max:255|unique:recruitments,email',
            'no_hp' => 'required|string|max:15',
            'jurusan' => 'required|in:Manajemen,Akuntansi,Informatika,Sistem Informasi',
            'kelas' => 'nullable|string|size:5',
            'region' => 'required|in:Depok,Kalimalang,Salemba,Karawaci,Cengkareng',
            'posisi_dilamar' => 'required|in:Asisten,Programmer',
            'alamat' => 'required|string',
            'tempat_lahir' => 'nullable|string|max:50',
            'tanggal_lahir' => 'nullable|date',
            'agama' => 'nullable|string|in:Islam,Kristen,Katolik,Hindu,Konghucu,Buddha',
            'sosial_media' => 'nullable|string|max:255',
            'berkas' => 'required|file|extensions:rar,zip|max:5120',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'npm.required' => 'NPM wajib diisi',
            'npm.unique' => 'NPM sudah terdaftar',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'email.email' => 'Format email tidak valid',
            'no_hp.required' => 'Nomor HP wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
            'region.required' => 'Region wajib dipilih',
            'posisi_dilamar.required' => 'Posisi yang dilamar wajib dipilih',
            'alamat.required' => 'Alamat wajib diisi',
            'berkas.required' => 'Berkas wajib diupload',
            'berkas.extensions' => 'Berkas harus berformat RAR atau ZIP',
            'berkas.max' => 'Ukuran berkas maksimal 5MB',
        ]);

        // Auto generate ID Calas
        $validated['id_calas'] = Recruitment::generateIdCalas(
            $validated['region'],
            $validated['posisi_dilamar']
        );

        // Otomatis isi recruitment_period_id dan tahun
        $validated['recruitment_period_id'] = $recruitmentPeriod->id;
        $validated['tahun'] = $recruitmentPeriod->tahun;

        // Handle file upload dengan folder per periode
        if ($request->hasFile('berkas')) {
            $file = $request->file('berkas');

            // Bersihkan nama dari karakter spesial
            $cleanNama = str_replace(' ', '_', $validated['nama']);
            $cleanNama = preg_replace('/[^A-Za-z0-9_]/', '', $cleanNama);

            $cleanRegion = ucfirst($validated['region']);

            // Format: IDCalas_Nama_Region.extension
            // Contoh: ASD1_Kemal_Depok.rar
            $fileName = $validated['id_calas'] . '_' . $cleanNama . '_' . $cleanRegion . '.' . $file->getClientOriginalExtension();

            // Simpan ke folder: storage/app/public/recruitments/{tahun}/
            $destinasi = storage_path('app/public/recruitments/' . $recruitmentPeriod->tahun);
            if (!file_exists($destinasi)) {
                mkdir($destinasi, 0775, true);
            }
            $file->move($destinasi, $fileName);

            $validated['berkas'] = 'recruitments/' . $recruitmentPeriod->tahun . '/' . $fileName;
        }

        Recruitment::create($validated);

        return redirect()->route('candidate.recruitments.success')
            ->with('success', 'Posisi yang dilamar: ' . $validated['posisi_dilamar']);
    }

    public function success()
    {
        return view('home.candidate_recruitments.success');
    }
}
