<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayerController;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('player', PlayerController::class)->only([
    'index',
]);

Route::resource('game', GameController::class)->only([
    'index',
]);

Route::middleware('auth')->group(function () {
    Route::resource('player', PlayerController::class)->except([
        'index',
    ]);
    
    Route::resource('game', GameController::class)->except([
        'index',
    ]);
});

require __DIR__.'/auth.php';
