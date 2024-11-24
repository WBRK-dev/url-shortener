<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\ShortenedURL;

class ShortenedURLRepository
{
    public function create(string $url): ShortenedURL
    {
        return ShortenedURL::create([
            'hash' => $this->generateHash(),
            'url' => $url
        ]);
    }

    public function findByHash(string $hash): ?ShortenedURL
    {
        return ShortenedURL::where('hash', $hash)->first();
    }

    public static function generateHash(): string
    {
        return substr(md5(uniqid()), 0, 4);
    }
}
