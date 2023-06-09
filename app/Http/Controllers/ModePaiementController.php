<?php
/*****************************************************************************
 Fichier : ModePaiementController
 Auteur : Amélie Fréchette
 Fonctionnalité : permet de gerer l'affichage, l'ajout et la modification des
 modes de paiement.
*****************************************************************************/
namespace App\Http\Controllers;

use App\Models\mode_paiement;
use Illuminate\Http\Request;

class ModePaiementController extends Controller
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
     * @param  \App\Models\mode_paiement  $mode_paiement
     * @return \Illuminate\Http\Response
     */
    public function show(mode_paiement $mode_paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mode_paiement  $mode_paiement
     * @return \Illuminate\Http\Response
     */
    public function edit(mode_paiement $mode_paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mode_paiement  $mode_paiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mode_paiement $mode_paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mode_paiement  $mode_paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy(mode_paiement $mode_paiement)
    {
        //
    }
}
