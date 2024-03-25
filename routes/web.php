<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BedrijfsinformatieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RittenController;

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
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/dashboard/admin', [DashboardController::class, 'admin'])
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');


Route::put('/dashboard/admin/prijs', [DashboardController::class, 'updatePrijs'])->name('admin.update.prijs');



Route::put('/dashboard/admin/prijs', [DashboardController::class, 'updatePrijs'])->name('admin.update.prijs');


Route::get('/dashboard/create-ritten', [RittenController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.create-ritten');

Route::post('/dashboard/create-ritten', [RittenController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.store-ritten');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/bedrijfsinformatie', [BedrijfsinformatieController::class, 'update'])->name('bedrijfsinformatie.update');

});

require __DIR__.'/auth.php';
