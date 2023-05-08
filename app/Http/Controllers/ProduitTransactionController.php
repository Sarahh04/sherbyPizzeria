<?php
/*****************************************************************************
 Fichier : ProduitTransactionController
 Auteur : Claudio Cruz
 Fonctionnalité : permet de gerer l'affichage, l'ajout et la modification de
 la table de junction entre le produit et la commande.
*****************************************************************************/
namespace App\Http\Controllers;

use App\Models\ProduitTransaction;
use Illuminate\Http\Request;

class ProduitTransactionController extends Controller
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
     * @param  \App\Models\ProduitTransaction  $produitTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(ProduitTransaction $produitTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProduitTransaction  $produitTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(ProduitTransaction $produitTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProduitTransaction  $produitTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProduitTransaction $produitTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProduitTransaction  $produitTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProduitTransaction $produitTransaction)
    {
        //
    }
}
