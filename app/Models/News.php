<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class News extends Model
{
    use HasFactory;
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'date_news',
        'image',
    ];
}
