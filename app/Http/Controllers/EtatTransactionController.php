<?php
/*****************************************************************************
 Fichier : EtatTransictionController
 Auteur : Claudio Cruz
 Fonctionnalité : permet de gerer l'affichage, l'ajout et la modification des
 états de commandes.
*****************************************************************************/
namespace App\Http\Controllers;

use App\Models\etat_transaction;
use Illuminate\Http\Request;

class EtatTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\etat_transaction  $etat_transaction
     * @return \Illuminate\Http\Response
     */
    public function show(etat_transaction $etat_transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\etat_transaction  $etat_transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(etat_transaction $etat_transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\etat_transaction  $etat_transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, etat_transaction $etat_transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\etat_transaction  $etat_transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(etat_transaction $etat_transaction)
    {
        //
    }
}
