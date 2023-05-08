<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DelaiCeuilletteController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ClientController;
use App\Http\Middleware\EnsureUserAdmin;
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
    Route::patch('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(TransactionController::class)->group(function () {
        Route::get('/gestionCommandes', 'index')->name('gestionCommandes');
        Route::get('/ajouterCommande', 'create')->name('ajouterCommande');
        Route::get('/consulterCommande', 'index')->name('consulterCommande');
        Route::get('/listerCommandes', 'index')->name('listerCommandes');
        Route::get('/commande/{id}', 'show')->name('detailCommande');
        Route::get('/resumeCommande', 'index')->name('resumeCommande');
        Route::get('/extraitCommande', 'index')->name('extraitCommande');
        Route::get('/extraitCommande/{id}', 'show')->name('extraitCommande');
        Route::get('/editerCommande/{id}', 'show')->name('editerCommande');
        Route::get('/editerCommande/commande', 'update')->name('enregistrerCommande');
        Route::get('/supprimerCommande/{id}', 'destroy')->name('supprimerCommande');
        Route::get('/filtrerCommandes', 'index')->name('filtrerCommandes');
    });


    Route::controller(ProduitController::class)->group(function () {
        Route::get('/promotions', 'index')->name('promotions');
        Route::get('/newPromotion', 'create')->name('newPromotion')->middleware(EnsureUserAdmin::class);
        Route::get('/gestion/produits', 'store')->name('gestionProduits')->middleware(EnsureUserAdmin::class);
        Route::get('/gestion/inventaire', 'index')->name('gestionInventaire')->middleware(EnsureUserAdmin::class);
        Route::post('/gestion/inventaire/search', 'update')->name('search');
        Route::get('/inventaire/modif/{id}', 'update')->name('modifProduits');
        Route::get('/inventaire/del/{id}', 'update')->name('delProduits');
        Route::post('/gestion/inventaire/update', 'update')->name('modifierBdProduit');
        Route::post('/supprimerProduit', 'destroy')->name('supprimerProduit')->middleware(EnsureUserAdmin::class);
        Route::get('/gestion/filter/promo', 'update')->name('produitPromo');
        Route::get('/gestion/filter/indispo', 'update')->name('produitIndispo');
    });

    Route::controller(DelaiCeuilletteController::class)->group(function () {
        Route::get('/delais', 'index')->name('delais');
        Route::get('/modifier/delais', 'edit')->name('modifierDelais');
        Route::get('/definir/delais', 'create')->name('definirDelais');
    });

    Route::controller(ClientController::class)->group(function () {
        Route::get('/clients', 'index')->name('consulterClient');
        Route::get('/modifier/client/{id}', 'edit')->name('modifierClient')->middleware(EnsureUserAdmin::class);
        Route::post('/update', 'update')->name('updateClient')->middleware(EnsureUserAdmin::class);
        Route::get('/ajouter/client', 'create')->name('ajouterClient');
        Route::get('/client/{id}', 'show')->name('detailClient');
        Route::post('/enregistrerClient', 'store')->name('enregistrementClient');
        Route::post('/supprimerClient', 'destroy')->name('supprimerUnClient')->middleware(EnsureUserAdmin::class);
        Route::post('/supprimerClient', 'destroy')->name('supprimerLeClient')->middleware(EnsureUserAdmin::class);
        Route::post('/filtrerClient', 'index')->name('filtrerClients');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/index', 'index')->name('indexUser');
        Route::get('/employes', 'index')->name('employes')->middleware(EnsureUserAdmin::class);
        Route::get('/newEmploye', 'create')->name('newEmploye')->middleware(EnsureUserAdmin::class);
        Route::post('/confirmAddEmploye', 'store')->name('insertEmploye')->middleware(EnsureUserAdmin::class);
        Route::get('/employe/{id}', 'show')->name('employe')->middleware(EnsureUserAdmin::class);
        Route::get('/modificationEmploye/{id}', 'edit')->name('modificationEmploye')->middleware(EnsureUserAdmin::class);
        Route::post('/modificationEmploye/{id}', 'update')->name('enregistrementEmploye')->middleware(EnsureUserAdmin::class);
        Route::post('/supprimerEmploye', 'destroy')->name('supprimerUnEmploye')->middleware(EnsureUserAdmin::class);
        Route::post('/filtrerEmp', 'index')->name('filtrerEmployer')->middleware(EnsureUserAdmin::class);
    });
});
Route::controller(TransactionController::class)->group(function () {
    Route::get('/gestionCommandes', 'index')->name('gestionCommandes');
    Route::get('/ajouterCommande', 'create')->name('ajouterCommande');
    Route::get('/consulterCommande', 'index')->name('consulterCommande');
    Route::post('/insererCommande', 'store')->name('insertCommande');
    Route::get('/listerCommandes', 'index')->name('listerCommandes');
    Route::get('/commande/{id}', 'show')->name('detailCommande');
    Route::get('/resumeCommande', 'index')->name('resumeCommande');
    Route::get('/extraitCommande/{id}', 'edit')->name('extraitCommande');
    Route::get('/editerCommande/{id}', 'show')->name('editerCommande');
    Route::get('/editerCommande/commande', 'update')->name('enregistrerCommande');
    Route::post('/supprimerCommande', 'destroy')->name('supprimerCommande');
});
require __DIR__ . '/auth.php';
