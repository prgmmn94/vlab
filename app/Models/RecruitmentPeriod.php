<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RecruitmentPeriod extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'tahun',
        'is_active',
    ];

    protected $casts = [
        'tahun' => 'integer',
        'is_active' => 'boolean',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function recruitments()
    {
        return $this->hasMany(Recruitment::class, 'recruitment_period_id');
    }

    /**
     * Aktifkan periode ini dan non-aktifkan yang lain
     */
    public function activate()
    {
        // Non-aktifkan semua periode lain
        self::where('id', '!=', $this->id)->update(['is_active' => false]);

        // Aktifkan periode ini
        $this->update(['is_active' => true]);
    }

    /**
     * Scope untuk mendapatkan periode aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
