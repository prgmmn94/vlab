<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class PhotoEvent extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'event_name',
        'event_date',
        'slug',
    ];

    /**
     * Auto-generate slug dari event_name
     */
    protected static function booted(): void
    {
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->event_name);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('event_name')) {
                $model->slug = Str::slug($model->event_name);
            }
        });
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    /**
     * Admin route pakai UUID (default)
     */
    public function getRouteKeyName(): string
    {
        return 'id';
    }
}
