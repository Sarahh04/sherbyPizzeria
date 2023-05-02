<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DelaiCeuilletteController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ClientController;
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

Route::controller(TransactionController::class)->group(function () {
    Route::get('/gestionCommandes', 'index')->name('gestionCommandes');
    Route::get('/ajouterCommande', 'create')->name('ajouterCommande');
    Route::get('/consulterCommande', 'show')->name('consulterCommande');
    Route::get('/listerCommandes', 'show')->name('listerCommandes');
    Route::get('/detaillerCommande', 'show')->name('detaillerCommande');
    Route::get('/extraitCommande', 'show')->name('extraitCommande');
    Route::get('/editerCommande', 'edit')->name('editerCommande');
    Route::get('/supprimerCommande', 'destroy')->name('supprimerCommande');
});


Route::controller(ProduitController::class)->group(function () {
    Route::get('/promotions', 'index')->name('promotions');
    Route::get('/newPromotion', 'create')->name('newPromotion');
    Route::get('/gestion/produits', 'store')->name('gestionProduits');
    Route::get('/gestion/inventaire', 'index')->name('gestionInventaire');
    Route::post('/gestion/inventaire/{nom}', 'update')->name('search');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/index', 'index')->name('indexUser');
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

Route::controller(ClientController::class)->group(function () {
    Route::get('/clients', 'index')->name('consulterClient');
    Route::get('/modifier/client/{id}', 'edit')->name('modifierClient');
    Route::post('/update', 'update')->name('updateClient');
    Route::get('/ajouter/client', 'create')->name('ajouterClient');
    Route::get('/client/{id}', 'show')->name('detailClient');
    Route::post('/enregistrerClient', 'store')->name('enregistrementClient');
});

require __DIR__ . '/auth.php';
