<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortenedURL extends Model
{
    use HasFactory;

    protected $primaryKey = 'hash';
    protected $table = 'shortened_urls';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'hash',
        'url'
    ];
}
