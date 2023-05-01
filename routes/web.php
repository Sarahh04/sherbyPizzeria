<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DelaiCeuilletteController;
use App\Http\Controllers\ProduitController;

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

Route::controller(ProduitController::class)->group(function () {
    Route::get('/promotions', 'index')->name('promotions');
    Route::get('/newPromotion', 'create')->name('newPromotion');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/employes', 'index')->name('employes');
    Route::get('/newEmploye', 'create')->name('newEmploye');
    Route::post('/confirmAddEmploye', 'store')->name('insertEmploye');
    Route::get('/employe/{id}', 'show')->name('employe');
    Route::get('/modificationEmploye/{id}', 'edit')->name('modificationEmploye');
    Route::post('/modificationEmploye/{id}', 'update')->name('enregistrementEmploye');
});

Route::controller(DelaiCeuilletteController::class)->group(function () {
    Route::get('/delais', 'index')->name('delais');
    Route::get('/modifier/delais', 'edit')->name('modifierDelais');
    Route::get('/definir/delais', 'create')->name('definirDelais');
});

Route::controller(ProduitController::class)->group(function () {
    Route::get('/gestion/produits', 'store')->name('gestionProduits');
    Route::get('/gestion/inventaire', 'index')->name('gestionInventaire');
});

require __DIR__ . '/auth.php';
