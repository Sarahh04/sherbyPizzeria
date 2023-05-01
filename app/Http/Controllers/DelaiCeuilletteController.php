<?php

namespace App\Http\Controllers;

use App\Models\delaiCeuillette;
use Illuminate\Http\Request;

class DelaiCeuilletteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = array();
        array_push($articles,'Pizza pépéronni');
        array_push($articles,'Québécquoise');
        return view('ceuillette/delaiCeuillette', ['noCommande' => 160, 'articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = array();
        array_push($articles,'Pizza pépéronni');
        array_push($articles,'Québécquoise');
        return view('ceuillette/definirDelai', ['delai' => 25, 'articles' => $articles]);

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
     * @param  \App\Models\delaiCeuillette  $delaiCeuillette
     * @return \Illuminate\Http\Response
     */
    public function show(delaiCeuillette $delaiCeuillette)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\delaiCeuillette  $delaiCeuillette
     * @return \Illuminate\Http\Response
     */
    public function edit(delaiCeuillette $delaiCeuillette)
    {
        return view('ceuillette/editerDelai', ['heureTardive' => '20h00','noCommande' => 160]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\delaiCeuillette  $delaiCeuillette
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, delaiCeuillette $delaiCeuillette)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\delaiCeuillette  $delaiCeuillette
     * @return \Illuminate\Http\Response
     */
    public function destroy(delaiCeuillette $delaiCeuillette)
    {
        //
    }
}
