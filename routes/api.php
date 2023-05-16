<?php
/*****************************************************************************
 Fichier : ClientRessource
 Auteur : Amélie Fréchette
 Fonctionnalité : contient tout les routes vers l'api
*****************************************************************************/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ClientController::class)->group(function() {
    Route::get('/clientInfo', 'show')->name('clientApi')->middleware('auth:sanctum');
    Route::post('/addClient', 'store')->name('addClientApi');
});

Route::controller(TransactionController::class)->group(function() {
    Route::get('/addTransaction', 'store')->name('transactionApi')->middleware('auth:sanctum');
});

Route::post('/token', [RegisteredUserController::class, 'show'])->name('token');
