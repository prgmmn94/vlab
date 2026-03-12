<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruitment;
use App\Models\RecruitmentPeriod;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use App\Exports\RecruitmentExport;
use Maatwebsite\Excel\Facades\Excel;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RecruitmentPeriod $recruitmentPeriod, Request $request)
    {
        $query = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('npm', 'like', "%{$search}%")
                    ->orWhere('jurusan', 'like', "%{$search}%")
                    ->orWhere('id_calas', 'like', "%{$search}%");
            });
        }

        $recruitments = $query->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        // Statistik umum
        $stats = [
            'programmer' => Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
                ->where('posisi_dilamar', 'programmer')
                ->count(),
            'asisten' => Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
                ->where('posisi_dilamar', 'asisten')
                ->count(),
            'with_berkas' => Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
                ->whereNotNull('berkas')
                ->count(),
        ];

        // Statistik per region
        $regions = ['Depok', 'Kalimalang', 'Salemba', 'Karawaci', 'Cengkareng'];
        $regionStats = [];

        foreach ($regions as $region) {
            $regionStats[$region] = [
                'programmer' => Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
                    ->where('region', $region)
                    ->where('posisi_dilamar', 'programmer')
                    ->count(),
                'asisten' => Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
                    ->where('region', $region)
                    ->where('posisi_dilamar', 'asisten')
                    ->count(),
            ];
        }

        return view('admin.recruitments.index', compact('recruitmentPeriod', 'recruitments', 'stats', 'regionStats'));
    }

    /**
     * Show thekspor form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, RecruitmentPeriod $recruitmentPeriod, Recruitment $recruitment)
    {
        return view('admin.recruitments.show', compact('recruitmentPeriod', 'recruitment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, RecruitmentPeriod $recruitmentPeriod, Recruitment $recruitment)
    {
        return view('admin.recruitments.edit', compact('recruitmentPeriod', 'recruitment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecruitmentPeriod $recruitmentPeriod, Recruitment $recruitment)
    {
        $validated = $request->validate([
            'id_calas' => 'nullable|string|max:255',
            'nama' => 'nullable|string|max:255',
            'npm' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'no_hp' => 'nullable|string|max:255',
            'jurusan' => 'nullable|string|max:255',
            'kelas' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'posisi_dilamar' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'agama' => 'nullable|string|max:255',
            'sosial_media' => 'nullable|string|max:255',
            'berkas' => 'nullable|file|mimes:rar,zip|max:5120',
        ]);

        // Update tahun jika periode berubah
        $validated['tahun'] = $recruitmentPeriod->tahun;

        // Handle file upload dengan folder per periode
        if ($request->hasFile('berkas')) {
            // Delete old file if exists
            if ($recruitment->berkas && Storage::disk('public')->exists($recruitment->berkas)) {
                Storage::disk('public')->delete($recruitment->berkas);
            }

            $file = $request->file('berkas');

            $cleanNama = str_replace(' ', '_', $validated['nama']);
            $cleanNama = preg_replace('/[^A-Za-z0-9_]/', '', $cleanNama);
            $cleanRegion = ucfirst($validated['region']);

            $fileName = ($validated['id_calas'] ?? $recruitment->id_calas) . '_' . $cleanNama . '_' . $cleanRegion . '.' . $file->getClientOriginalExtension();

            // Simpan ke folder periode
            $folderPath = 'recruitments/' . $recruitmentPeriod->tahun;
            $filePath = $file->storeAs($folderPath, $fileName, 'public');

            $validated['berkas'] = $filePath;
        }

        $recruitment->update($validated);

        return redirect()->route('admin.recruitments.index', $recruitmentPeriod->id)
            ->with('success', 'Data recruitment berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecruitmentPeriod $recruitmentPeriod, Recruitment $recruitment)
    {
        // Hapus file dari storage
        if ($recruitment->berkas && Storage::disk('public')->exists($recruitment->berkas)) {
            Storage::disk('public')->delete($recruitment->berkas);
        }

        $recruitment->delete();

        return redirect()->route('admin.recruitments.index', $recruitmentPeriod->id)
            ->with('success', 'Data recruitment berhasil dihapus!');
    }

    /**
     * Download berkas per region
     */
    public function downloadByRegion(RecruitmentPeriod $recruitmentPeriod, $region)
    {
        $count = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
            ->where('region', $region)
            ->whereNotNull('berkas')
            ->count();

        if ($count === 0) {
            return redirect()->back()->with('error', "Tidak ada berkas untuk region {$region}!");
        }

        // Validasi region
        $validRegions = ['Depok', 'Kalimalang', 'Salemba', 'Karawaci', 'Cengkareng'];
        if (!in_array($region, $validRegions)) {
            return redirect()->back()->with('error', 'Region tidak valid!');
        }

        // Ambil semua recruitment di region tersebut
        $recruitments = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
            ->where('region', $region)
            ->whereNotNull('berkas')
            ->get();

        if ($recruitments->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada berkas di region ' . $region);
        }

        // Buat ZIP file
        $zipFileName = 'Berkas_' . $region . '_' . $recruitmentPeriod->tahun . '.zip';
        $zipFilePath = storage_path('app/temp/' . $zipFileName);

        // Pastikan folder temp ada
        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($recruitments as $recruitment) {
                $filePath = storage_path('app/public/' . $recruitment->berkas);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($recruitment->berkas));
                }
            }
            $zip->close();
        }

        // Download dan hapus file temporary
        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }

    /**
     * Download berkas per posisi
     */
    public function downloadByPosition(RecruitmentPeriod $recruitmentPeriod, $posisi)
    {
        $count = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
            ->where('posisi_dilamar', $posisi)
            ->whereNotNull('berkas')
            ->count();

        if ($count === 0) {
            return redirect()->back()->with('error', "Tidak ada berkas untuk posisi {$posisi}!");
        }

        // Validasi posisi
        $validPositions = ['programmer', 'asisten'];
        if (!in_array(strtolower($posisi), $validPositions)) {
            return redirect()->back()->with('error', 'Posisi tidak valid!');
        }

        $posisi = strtolower($posisi);

        // Ambil semua recruitment di posisi tersebut
        $recruitments = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
            ->where('posisi_dilamar', $posisi)
            ->whereNotNull('berkas')
            ->get();

        if ($recruitments->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada berkas untuk posisi ' . ucfirst($posisi));
        }

        // Buat ZIP file
        $zipFileName = 'Berkas_' . ucfirst($posisi) . '_' . $recruitmentPeriod->tahun . '.zip';
        $zipFilePath = storage_path('app/temp/' . $zipFileName);

        // Pastikan folder temp ada
        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($recruitments as $recruitment) {
                $filePath = storage_path('app/public/' . $recruitment->berkas);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($recruitment->berkas));
                }
            }
            $zip->close();
        }

        // Download dan hapus file temporary
        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }

    /**
     * Download berkas per region DAN posisi
     */
    public function downloadByRegionAndPosition(RecruitmentPeriod $recruitmentPeriod, $region, $posisi)
    {
        // Validasi region
        $validRegions = ['Depok', 'Kalimalang', 'Salemba', 'Karawaci', 'Cengkareng'];
        if (!in_array($region, $validRegions)) {
            return redirect()->back()->with('error', 'Region tidak valid!');
        }

        // Validasi posisi
        $validPositions = ['programmer', 'asisten'];
        if (!in_array(strtolower($posisi), $validPositions)) {
            return redirect()->back()->with('error', 'Posisi tidak valid!');
        }

        $posisi = strtolower($posisi);

        // Ambil semua recruitment di region dan posisi tersebut
        $recruitments = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
            ->where('region', $region)
            ->where('posisi_dilamar', $posisi)
            ->whereNotNull('berkas')
            ->get();

        if ($recruitments->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada berkas untuk ' . ucfirst($posisi) . ' di ' . $region);
        }

        // Buat ZIP file
        $zipFileName = 'Berkas_' . ucfirst($posisi) . '_' . $region . '_' . $recruitmentPeriod->tahun . '.zip';
        $zipFilePath = storage_path('app/temp/' . $zipFileName);

        // Pastikan folder temp ada
        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($recruitments as $recruitment) {
                $filePath = storage_path('app/public/' . $recruitment->berkas);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($recruitment->berkas));
                }
            }
            $zip->close();
        }

        // Download dan hapus file temporary
        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }

    /**
     * Download semua berkas dalam periode
     */
    public function downloadAll(RecruitmentPeriod $recruitmentPeriod)
    {
        $count = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
            ->whereNotNull('berkas')
            ->count();

        if ($count === 0) {
            return redirect()->back()->with('error', 'Tidak ada berkas yang tersedia untuk didownload!');
        }

        // Ambil semua recruitment dalam periode
        $recruitments = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
            ->whereNotNull('berkas')
            ->get();

        if ($recruitments->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada berkas yang tersedia!');
        }

        // Buat ZIP file
        $zipFileName = 'Semua_Berkas_' . $recruitmentPeriod->tahun . '.zip';
        $zipFilePath = storage_path('app/temp/' . $zipFileName);

        // Pastikan folder temp ada
        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($recruitments as $recruitment) {
                $filePath = storage_path('app/public/' . $recruitment->berkas);
                if (file_exists($filePath)) {
                    // Buat subfolder per region dalam ZIP
                    $folderInZip = $recruitment->region . '/' . ucfirst($recruitment->posisi_dilamar) . '/';
                    $zip->addFile($filePath, $folderInZip . basename($recruitment->berkas));
                }
            }
            $zip->close();
        }

        // Download dan hapus file temporary
        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }

    /**
     * Export
     */
    public function export(RecruitmentPeriod $recruitmentPeriod)
    {
        // Cek apakah ada data recruitment
        $count = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)->count();

        if ($count === 0) {
            return redirect()->back()->with('error', 'Tidak ada data yang tersedia untuk diekspor!');
        }

        // Generate filename dengan timestamp
        $filename = 'Data_Calas_Periode_' . $recruitmentPeriod->tahun . '_' . date('d-m-Y_His') . '.xlsx';

        return Excel::download(
            new RecruitmentExport($recruitmentPeriod->id),
            $filename
        );
    }
}
