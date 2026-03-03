<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RecruitmentPeriod extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'tahun',
    ];

    protected $casts = [
        'tahun' => 'integer',
    ];
}
