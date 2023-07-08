<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KecocokanLahanController;
use App\Http\Controllers\SpkController;
use App\Http\Controllers\TanamanController;

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

Route::get('/dashboard', function () {
    return view('spks.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/tanamans', function () {
        return view('tanamans.index');
    })->name('tanamans.home');
    
    Route::get('/tanamans/{id}', [TanamanController::class, 'show'])->name('tanamans.details');
    
    Route::get('/tanamans/{id}/edit', [TanamanController::class, 'edit'])->name('tanamans.edit');
    
    Route::get('/kriterias', function () {
        return view('kriterias.index');
    })->name('kriterias.home');
    
    // Route::get('/kecocokans/create/kriteria/{kriteria_id}/tanaman/{tanaman_id}', [KecocokanLahanController::class, 'create'])->name('kecocokans.create');
    // Route::post('/kecocokans', [KecocokanLahanController::class, 'store'])->name('kecocokans.store');
    // Route::get('/kecocokans/create', [KecocokanLahanController::class, 'create'])->name('kecocokans.create');
    // Route::get('/kecocokans/{id}/edit', [KecocokanLahanController::class, 'edit'])->name('kecocokans.edit');
    Route::resource('kecocokans', KecocokanLahanController::class);
    
    Route::get('/spks', function () {
        return view('spks.index');
    })->name('spks.home');
    
    Route::get('/spk/create', [SpkController::class, 'create'])->name('spk.create');
    Route::get('/spk/{id}', [SpkController::class, 'show'])->name('spk.details');
    
});

Route::get('/spk/guest/create', [SpkController::class, 'createGuest'])->name('spk.guest.create');
Route::get('spk/guest/{id}', [SpkController::class, 'showGuest'])->name('spk.guest.details');

require __DIR__.'/auth.php';


