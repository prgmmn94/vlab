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
     * Contoh: APD1, ASJ1
     */
    public static function generateIdCalas($region, $posisi)
    {
        $posisiCodes = [
            'Programmer' => 'AP',
            'Asisten' => 'AS',
        ];

        $regionCodes = [
            'Depok' => 'D',
            'Kalimalang' => 'J',
            'Salemba' => 'C',
            'Karawaci' => 'K',
            'Cengkareng' => 'L',
        ];

        $posisiTitle = ucfirst(strtolower($posisi));
        $regionTitle = ucfirst(strtolower($region));

        $posisiCode = $posisiCodes[$posisiTitle] ?? 'XX';

        $regionCode = $regionCodes[$regionTitle] ?? 'X';

        $lastRecord = self::where('id_calas', 'like', $posisiCode . $regionCode . '%')
            ->lockForUpdate()
            ->orderByRaw('CAST(SUBSTRING(id_calas, ?) AS UNSIGNED) DESC', [strlen($posisiCode . $regionCode) + 1])
            ->first();

        if ($lastRecord) {
            preg_match('/\d+$/', $lastRecord->id_calas, $matches);
            $nextNumber = isset($matches[0]) ? intval($matches[0]) + 1 : 1;
        } else {
            $nextNumber = 1;
        }

        return $posisiCode . $regionCode . $nextNumber;
    }
}
