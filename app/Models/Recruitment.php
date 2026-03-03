<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $fillable = [
        'nama',
        'npm',
        'jurusan',
        'kelas',
        'jurusan',
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
}
