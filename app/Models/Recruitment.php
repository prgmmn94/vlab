<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Recruitment extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'recruitment_period_id',
        'tahun',
        'id_calas',
        'nama',
        'npm',
        'jurusan',
        'kelas',
        'region',
        'posisi_dilamar',
        'agama',
        'email',
        'no_hp',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'sosial_media',
        'berkas',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tahun' => 'integer',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function recruitmentPeriod()
    {
        return $this->belongsTo(RecruitmentPeriod::class);
    }

    /**
     * Generate ID Calas berdasarkan region dan posisi
     * Format: [Kode Posisi][Kode Region][Nomor]
     * Contoh: APD1, APK1, ASGD2
     */
    public static function generateIdCalas($region, $posisi)
    {
        // Mapping kode posisi (Title Case key)
        $posisiCodes = [
            'Programmer' => 'AP',
            'Asisten' => 'AS',
        ];

        // Mapping kode region (Title Case key)
        $regionCodes = [
            'Depok' => 'D',
            'Kalimalang' => 'K',
            'Salemba' => 'S',
            'Karawaci' => 'KR',
            'Cengkareng' => 'C',
        ];

        // Ubah ke Title Case (huruf pertama kapital)
        $posisiTitle = ucfirst(strtolower($posisi));
        $regionTitle = ucfirst(strtolower($region));

        // Ambil kode posisi (default 'XX' jika tidak ditemukan)
        $posisiCode = $posisiCodes[$posisiTitle] ?? 'XX';

        // Ambil kode region (default 'X' jika tidak ditemukan)
        $regionCode = $regionCodes[$regionTitle] ?? 'X';

        // Cari nomor terakhir dengan kombinasi posisi+region yang sama
        $lastRecord = self::where('id_calas', 'like', $posisiCode . $regionCode . '%')
            ->orderBy('id_calas', 'desc')
            ->first();

        if ($lastRecord) {
            // Extract nomor dari id_calas terakhir
            preg_match('/\d+$/', $lastRecord->id_calas, $matches);
            $nextNumber = isset($matches[0]) ? intval($matches[0]) + 1 : 1;
        } else {
            $nextNumber = 1;
        }

        return $posisiCode . $regionCode . $nextNumber;
    }
}
