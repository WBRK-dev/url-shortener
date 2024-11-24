<?php

namespace App\Http\Controllers;

use App\Repositories\ShortenedURLRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class URLController extends Controller
{
    public function __construct(
        protected ShortenedURLRepository $shortenedURLRepository
    ) {
    }

    function shorten(Request $request): JsonResponse
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $shortened = $this->shortenedURLRepository->create($request->input('url'));

        return response()->json([
            'shortened' => route('redirect', ['hash' => $shortened->hash])
        ]);
    }

    function redirect(string $hash): JsonResponse|RedirectResponse
    {
        $shortened = $this->shortenedURLRepository->findByHash($hash);

        if ($shortened === null) {
            return response()->json([
                'error' => 'URL not found'
            ], 404);
        }

        return response()->redirectTo($shortened->url);
    }
}
