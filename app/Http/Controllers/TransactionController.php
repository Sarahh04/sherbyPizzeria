<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\Transaction as ModelsTransaction;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('commandes/gestionCommandes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commandes/ajouterCommande');
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
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if ($request->routeIs('listerCommandes')) {
            return view('commandes/listerCommandes',[
                'commandes' => Transaction::All(),
                'users'=> User::All() ]);
        }
        if ($request->routeIs('consulterCommande')) {
            return view('commandes/consulterCommande');
        }
        if ($request->routeIs('detaillerCommande')) {
            return view('commandes/detaillerCommande');
        }
        if ($request->routeIs('extraitCommande')) {
            return view('commandes/extraitCommande');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(transaction $transaction)
    {
        return view('commandes/editerCommande');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaction $transaction)
    {
        return view('commandes/supprimerCommande');
    }
}
