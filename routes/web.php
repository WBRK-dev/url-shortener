<?php

use App\Http\Controllers\URLController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::inertia('/', 'Home/Index', [
    "routes" => [
        "api-shorten" => URL::to('/api/shorten')
    ]
])->name('home');

Route::post('/api/shorten', [URLController::class, 'shorten'])->name('shorten');

Route::get('/test', function () {
    return \App\Repositories\ShortenedURLRepository::generateHash();
});

Route::get('/{hash}', [URLController::class, 'redirect'])->name('redirect');
