<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruitment;
use App\Models\RecruitmentPeriod;
use Illuminate\View\View;
use ZipArchive;
use App\Exports\RecruitmentExport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RecruitmentPeriod $recruitmentPeriod, Request $request)
    {
        $query = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id);

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

        $lastEntry = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
            ->latest('created_at')
            ->first();

        return view('admin.recruitments.index', compact('recruitmentPeriod', 'recruitments', 'stats', 'regionStats', 'lastEntry'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, RecruitmentPeriod $recruitmentPeriod, Recruitment $recruitment)
    {
        return view('admin.recruitments.show', compact('recruitmentPeriod', 'recruitment'));
    }

    public function edit(Request $request, RecruitmentPeriod $recruitmentPeriod, Recruitment $recruitment)
    {
        return view('admin.recruitments.edit', compact('recruitmentPeriod', 'recruitment'));
    }

    public function update(Request $request, RecruitmentPeriod $recruitmentPeriod, Recruitment $recruitment)
    {
        $validated = $request->validate([
            'id_calas'       => 'nullable|string|max:255',
            'nama'           => 'nullable|string|max:255',
            'npm'            => 'nullable|string|max:255',
            'email'          => 'nullable|email|max:255',
            'no_hp'          => 'nullable|string|max:255',
            'jurusan'        => 'nullable|string|max:255',
            'kelas'          => 'nullable|string|max:255',
            'region'         => 'nullable|string|max:255',
            'posisi_dilamar' => 'nullable|string|max:255',
            'alamat'         => 'nullable|string',
            'tempat_lahir'   => 'nullable|string|max:255',
            'tanggal_lahir'  => 'nullable|date',
            'agama'          => 'nullable|string|max:255',
            'sosial_media'   => 'nullable|string|max:255',
            'berkas'         => 'nullable|file|extensions:rar,zip|max:5120',
        ]);

        $validated['tahun'] = $recruitmentPeriod->tahun;

        if ($request->hasFile('berkas')) {
            // Hapus file lama jika ada
            if ($recruitment->berkas) {
                $oldPath = storage_path('app/public/' . $recruitment->berkas);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $file        = $request->file('berkas');
            $cleanNama   = str_replace(' ', '_', $validated['nama']);
            $cleanNama   = preg_replace('/[^A-Za-z0-9_]/', '', $cleanNama);
            $cleanRegion = ucfirst($validated['region']);
            $fileName    = ($validated['id_calas'] ?? $recruitment->id_calas) . '_' . $cleanNama . '_' . $cleanRegion . '.' . $file->getClientOriginalExtension();

            // Gunakan move() langsung, tidak pakai storeAs (tidak butuh fileinfo)
            $destinasi = storage_path('app/public/recruitments/' . $recruitmentPeriod->tahun);
            if (!file_exists($destinasi)) {
                mkdir($destinasi, 0775, true);
            }
            $file->move($destinasi, $fileName);

            $validated['berkas'] = 'recruitments/' . $recruitmentPeriod->tahun . '/' . $fileName;
        }

        $recruitment->update($validated);

        return redirect()->route('admin.recruitments.index', $recruitmentPeriod->id)
            ->with('success', 'Data recruitment berhasil diperbarui!');
    }

    public function destroy(RecruitmentPeriod $recruitmentPeriod, Recruitment $recruitment)
    {
        if ($recruitment->berkas) {
            $oldPath = storage_path('app/public/' . $recruitment->berkas);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
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
        $validRegions = ['Depok', 'Kalimalang', 'Salemba', 'Karawaci', 'Cengkareng'];
        if (!in_array($region, $validRegions)) {
            return redirect()->back()->with('error', 'Region tidak valid!');
        }

        $recruitments = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
            ->where('region', $region)
            ->whereNotNull('berkas')
            ->get();

        if ($recruitments->isEmpty()) {
            return redirect()->back()->with('error', "Tidak ada berkas untuk region {$region}!");
        }

        $zipFileName = 'Berkas_' . $region . '_' . $recruitmentPeriod->tahun . '.zip';
        $zipFilePath = storage_path('app/temp/' . $zipFileName);

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

        return response()->download($zipFilePath, $zipFileName, [
            'Content-Type' => 'application/zip',
        ])->deleteFileAfterSend(true);
    }

    /**
     * Download berkas per posisi
     */
    public function downloadByPosition(RecruitmentPeriod $recruitmentPeriod, $posisi)
    {
        $validPositions = ['programmer', 'asisten'];
        if (!in_array(strtolower($posisi), $validPositions)) {
            return redirect()->back()->with('error', 'Posisi tidak valid!');
        }

        $posisi = strtolower($posisi);

        $recruitments = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
            ->where('posisi_dilamar', $posisi)
            ->whereNotNull('berkas')
            ->get();

        if ($recruitments->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada berkas untuk posisi ' . ucfirst($posisi));
        }

        $zipFileName = 'Berkas_' . ucfirst($posisi) . '_' . $recruitmentPeriod->tahun . '.zip';
        $zipFilePath = storage_path('app/temp/' . $zipFileName);

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

        return response()->download($zipFilePath, $zipFileName, [
            'Content-Type' => 'application/zip',
        ])->deleteFileAfterSend(true);
    }

    /**
     * Download berkas per region DAN posisi
     */
    public function downloadByRegionAndPosition(RecruitmentPeriod $recruitmentPeriod, $region, $posisi)
    {
        $validRegions = ['Depok', 'Kalimalang', 'Salemba', 'Karawaci', 'Cengkareng'];
        if (!in_array($region, $validRegions)) {
            return redirect()->back()->with('error', 'Region tidak valid!');
        }

        $validPositions = ['programmer', 'asisten'];
        if (!in_array(strtolower($posisi), $validPositions)) {
            return redirect()->back()->with('error', 'Posisi tidak valid!');
        }

        $posisi = strtolower($posisi);

        $recruitments = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
            ->where('region', $region)
            ->where('posisi_dilamar', $posisi)
            ->whereNotNull('berkas')
            ->get();

        if ($recruitments->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada berkas untuk ' . ucfirst($posisi) . ' di ' . $region);
        }

        $zipFileName = 'Berkas_' . ucfirst($posisi) . '_' . $region . '_' . $recruitmentPeriod->tahun . '.zip';
        $zipFilePath = storage_path('app/temp/' . $zipFileName);

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

        return response()->download($zipFilePath, $zipFileName, [
            'Content-Type' => 'application/zip',
        ])->deleteFileAfterSend(true);
    }

    /**
     * Download semua berkas dalam periode
     */
    public function downloadAll(RecruitmentPeriod $recruitmentPeriod)
    {
        $recruitments = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
            ->whereNotNull('berkas')
            ->get();

        if ($recruitments->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada berkas yang tersedia!');
        }

        $zipFileName = 'Semua_Berkas_' . $recruitmentPeriod->tahun . '.zip';
        $zipFilePath = storage_path('app/temp/' . $zipFileName);

        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($recruitments as $recruitment) {
                $filePath = storage_path('app/public/' . $recruitment->berkas);
                if (file_exists($filePath)) {
                    $folderInZip = $recruitment->region . '/' . ucfirst($recruitment->posisi_dilamar) . '/';
                    $zip->addFile($filePath, $folderInZip . basename($recruitment->berkas));
                }
            }
            $zip->close();
        }

        return response()->download($zipFilePath, $zipFileName, [
            'Content-Type' => 'application/zip',
        ])->deleteFileAfterSend(true);
    }

    /**
     * Download single berkas recruitment
     */
    public function downloadBerkas(RecruitmentPeriod $recruitmentPeriod, Recruitment $recruitment)
    {
        if (!$recruitment->berkas) {
            return redirect()->back()->with('error', 'Berkas tidak tersedia!');
        }

        $filePath = storage_path('app/public/' . $recruitment->berkas);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan di server!');
        }

        // Tentukan Content-Type berdasarkan ekstensi, tanpa butuh fileinfo
        $ext         = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $contentType = $ext === 'zip' ? 'application/zip' : 'application/octet-stream';

        return response()->download($filePath, basename($recruitment->berkas), [
            'Content-Type' => $contentType,
        ]);
    }

    /**
     * Export Excel
     */
    public function export(RecruitmentPeriod $recruitmentPeriod)
    {
        ini_set('display_errors', 0);
        ini_set('zlib.output_compression', 'Off');

        $data = Recruitment::where(
            'recruitment_period_id',
            $recruitmentPeriod->id
        )->get();

        if ($data->isEmpty()) {
            return redirect()->back()
                ->with('error', 'Tidak ada data!');
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $headers = [
            'No',
            'ID Calas',
            'Nama',
            'NPM',
            'Program Studi',
            'Kelas',
            'Region',
            'Posisi',
            'Agama',
            'Email',
            'No HP',
            'Alamat',
            'Sosial Media'
        ];

        $col = 'A';

        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Style Header
        $sheet->getStyle('A1:M1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF']
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '1F4E78'
                ]
            ]
        ]);

        // Data
        $rowNum = 2;
        $no = 1;

        foreach ($data as $row) {

            $sheet->setCellValue('A' . $rowNum, $no++);
            $sheet->setCellValue('B' . $rowNum, $row->id_calas);
            $sheet->setCellValue('C' . $rowNum, $row->nama);
            $sheet->setCellValue('D' . $rowNum, $row->npm);
            $sheet->setCellValue('E' . $rowNum, $row->jurusan);
            $sheet->setCellValue('F' . $rowNum, $row->kelas);
            $sheet->setCellValue('G' . $rowNum, $row->region);
            $sheet->setCellValue('H' . $rowNum, $row->posisi_dilamar);
            $sheet->setCellValue('I' . $rowNum, $row->agama);
            $sheet->setCellValue('J' . $rowNum, $row->email);
            $sheet->setCellValue('K' . $rowNum, $row->no_hp);
            $sheet->setCellValue('L' . $rowNum, $row->alamat);
            $sheet->setCellValue('M' . $rowNum, $row->sosial_media);

            $rowNum++;
        }

        // Auto Width
        foreach (range('A', 'M') as $column) {
            $sheet->getColumnDimension($column)
                ->setAutoSize(true);
        }

        // Border
        $lastRow = $rowNum - 1;

        $sheet->getStyle("A1:M{$lastRow}")
            ->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                    ],
                ],
            ]);

        $filename = 'Data_Calas_' . date('d-m-Y_H-i-s') . '.xlsx';

        // Bersihkan buffer
        while (ob_get_level()) {
            ob_end_clean();
        }

        return response()->streamDownload(function () use ($spreadsheet) {

            $writer = new Xlsx($spreadsheet);

            $writer->setPreCalculateFormulas(false);

            $writer->save('php://output');
        }, $filename, [
            'Content-Type' =>
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Cache-Control' =>
            'max-age=0',
        ]);
    }
}
