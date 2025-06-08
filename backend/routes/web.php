<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RedisController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
Route::get('/', function () {
    return view('index');
});

Route::get('/redis', [RedisController::class, 'index']);
Route::get('/roles', [RolesController::class, "index"]);

Route::middleware('auth')->group(function () {
    Route::post('api/newevent', [EventController::class, 'createEvent']);
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
