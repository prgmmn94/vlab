<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PhotoEvent extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'event_name',
        'slug',
    ];

    /**
     * Relationship: Event has many photos
     */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
