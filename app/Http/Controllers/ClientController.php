<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::Where('id_role',2)->get();
        return view('client/listeClients',['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client/addClient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'tel' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'adresseFact' => 'required',
            'courriel' => 'required',
            'points' => 'required',
            ], [
            // Vous pouvez écrire un message d’erreur distinct par règle de validation fournie plus haut.
            'tel.required' => 'Veuillez entrer un numéro de téléphone.',
            'tel.regex' => 'Le numéro de téléphone ne respecte pas le format attendu.',
            'courriel.required' => 'Veuillez entrer un courriel.',
            'prenom.required' => 'Veuillez entrer un prenom.',
            'nom.required' => 'Veuillez entrer un nom.',
            'adresse.required' => 'Veuillez entrer une adresse.',
            'adresseFact.required' => 'Veuillez entrer une adresse de facturation',
            'ponts.required' => 'Veuillez attribuer des points.',
            ]);
            if ($validation->fails())
            return back()->withErrors($validation->errors())->withInput();

        $contenuFormulaire = $validation->validated();

        $request->role = 2;
        $user = User::create([
            'name' => $request->nom,
            'email' => $request->courriel,
            'telephone' => $request->tel,
            'adresse' => $request->adresse,
            'password' => Hash::make("abc123456"),
            'poste' => "client",
            'id_role' => 2
        ]);


        if(event(new Registered($user)))
        {
            return view('client/listeClients');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        return view('client/detailClient');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(client $client)
    {
        return view('client/editClient');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(client $client)
    {
        //
    }
}
