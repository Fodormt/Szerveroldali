<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Event;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    $events = Event::all();
    return view('autocheck.search', ['events' => $events, 'user' => Auth::user()]);
});

Route::get('/dashboard', function () {
    $events = Event::all();
    return view('autocheck.search', ['events' => $events, 'user' => Auth::user()]);
});

Route::get('/histories/my_history', [HistoryController::class, 'my_history'])
    ->name('histories.my_history');

Route::resource('events', EventController::class);
Route::resource('vehicles', VehicleController::class);
Route::resource('histories', HistoryController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
