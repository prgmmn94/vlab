<?php

namespace App\Exports;

use App\Models\Recruitment; // Sesuaikan dengan nama model Anda
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class RecruitmentExport implements FromCollection, WithMapping, WithEvents, ShouldAutoSize
{
    protected $rowNumber = 0;
    protected $recruitmentPeriodId;

    public function __construct($recruitmentPeriodId)
    {
        $this->recruitmentPeriodId = $recruitmentPeriodId;
    }

    public function collection()
    {
        return Recruitment::where('recruitment_period_id', $this->recruitmentPeriodId)->get();
    }

    public function map($recruitment): array
    {
        $this->rowNumber++;

        return [
            $this->rowNumber,
            $recruitment->id_calas,
            $recruitment->nama,
            $recruitment->npm,
            $recruitment->jurusan,
            $recruitment->kelas,
            $recruitment->region,
            $recruitment->posisi_dilamar,
            $recruitment->agama,
            $recruitment->email,
            $recruitment->no_hp,
            $recruitment->alamat,
            $recruitment->tempat_lahir,
            $recruitment->tanggal_lahir,
            $recruitment->sosial_media,
            // $recruitment->berkas, // Biasanya berkas tidak di-export (path/URL)
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Insert 2 baris di awal untuk header
                $sheet->insertNewRowBefore(1, 2);

                // Set header text
                $sheet->setCellValue('A1', 'No');
                $sheet->setCellValue('B1', 'ID Calas');
                $sheet->setCellValue('C1', 'Nama');
                $sheet->setCellValue('D1', 'NPM');
                $sheet->setCellValue('E1', 'Jurusan');
                $sheet->setCellValue('F1', 'Kelas');
                $sheet->setCellValue('G1', 'Region');
                $sheet->setCellValue('H1', 'Posisi Dilamar');
                $sheet->setCellValue('I1', 'Agama');
                $sheet->setCellValue('J1', 'Email');
                $sheet->setCellValue('K1', 'No HP');
                $sheet->setCellValue('L1', 'Alamat');
                $sheet->setCellValue('M1', 'Tempat Lahir');
                $sheet->setCellValue('N1', 'Tanggal Lahir');
                $sheet->setCellValue('O1', 'Sosial Media');

                // Merge header menjadi 2 row
                $sheet->mergeCells('A1:A2');
                $sheet->mergeCells('B1:B2');
                $sheet->mergeCells('C1:C2');
                $sheet->mergeCells('D1:D2');
                $sheet->mergeCells('E1:E2');
                $sheet->mergeCells('F1:F2');
                $sheet->mergeCells('G1:G2');
                $sheet->mergeCells('H1:H2');
                $sheet->mergeCells('I1:I2');
                $sheet->mergeCells('J1:J2');
                $sheet->mergeCells('K1:K2');
                $sheet->mergeCells('L1:L2');
                $sheet->mergeCells('M1:M2');
                $sheet->mergeCells('N1:N2');
                $sheet->mergeCells('O1:O2');

                // Styling header
                $sheet->getStyle('A1:O2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => ['borderStyle' => Border::BORDER_THIN],
                    ],
                ]);

                // Set row height untuk header
                $sheet->getRowDimension(1)->setRowHeight(25);
                $sheet->getRowDimension(2)->setRowHeight(25);

                // Freeze header
                $sheet->freezePane('A3');

                // Border untuk semua data
                $lastRow = $sheet->getHighestRow();
                $sheet->getStyle("A1:O{$lastRow}")->applyFromArray([
                    'borders' => [
                        'allBorders' => ['borderStyle' => Border::BORDER_THIN],
                    ],
                ]);
            },
        ];
    }
}
