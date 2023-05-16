<?php
/*****************************************************************************
 Fichier : NoteDossierController
 Auteur : Sarah Diakite
 Fonctionnalité : permet de gerer l'affichage, l'ajout et la modification des
 notes de dossier de clients.
*****************************************************************************/
namespace App\Http\Controllers;

use App\Models\note_dossier;
use Illuminate\Http\Request;

class NoteDossierController extends Controller
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
     * @param  \App\Models\note_dossier  $note_dossier
     * @return \Illuminate\Http\Response
     */
    public function show(note_dossier $note_dossier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\note_dossier  $note_dossier
     * @return \Illuminate\Http\Response
     */
    public function edit(note_dossier $note_dossier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\note_dossier  $note_dossier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, note_dossier $note_dossier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\note_dossier  $note_dossier
     * @return \Illuminate\Http\Response
     */
    public function destroy(note_dossier $note_dossier)
    {
        //
    }
}
