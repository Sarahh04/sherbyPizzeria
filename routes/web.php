<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(TransactionController::class)->group(function() {
    Route::get('/gestionCommandes', 'index')->name('gestionCommandes');
    Route::get('/ajouterCommande', 'create')->name('ajouterCommande');
    Route::get('/consulterCommande', 'show')->name('consulterCommande');
    Route::get('/listerCommandes', 'show')->name('listerCommandes');
    Route::get('/detaillerCommande', 'show')->name('detaillerCommande');
    Route::get('/extraitCommande', 'show')->name('extraitCommande');
    Route::get('/editerCommande', 'edit')->name('editerCommande');
    Route::get('/supprimerCommande', 'destroy')->name('supprimerCommande');
});


require __DIR__.'/auth.php';
