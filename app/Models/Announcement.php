<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model
{
    use HasUuids;

    protected $fillable = [
        'recruitment_period_id',
        'nama_tahap',
        'link_google_sheets',
        'deskripsi',
        'urutan',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'urutan'       => 'integer',
    ];


    public function recruitmentPeriod(): BelongsTo
    {
        return $this->belongsTo(RecruitmentPeriod::class);
    }


    /** Hanya tampilkan yang sudah dipublish, urut by urutan */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderBy('urutan');
    }

    /** Urut berdasarkan kolom urutan */
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan');
    }


    /** Toggle status publish */
    public function togglePublish(): void
    {
        $this->update(['is_published' => !$this->is_published]);
    }

    /** Ambil urutan tertinggi dalam satu periode + 1 */
    public static function nextOrder(string $recruitmentPeriodId): int
    {
        return (static::where('recruitment_period_id', $recruitmentPeriodId)->max('urutan') ?? 0) + 1;
    }
}
