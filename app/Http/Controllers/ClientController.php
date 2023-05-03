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
            'adresse' => 'required',
            'courriel' => 'required',
            'points' => 'required',
            ], [
            // Vous pouvez écrire un message d’erreur distinct par règle de validation fournie plus haut.
            'tel.required' => 'Veuillez entrer un numéro de téléphone.',
            'tel.regex' => 'Le numéro de téléphone ne respecte pas le format attendu.',
            'courriel.required' => 'Veuillez entrer un courriel.',
            'nom.required' => 'Veuillez entrer un nom.',
            'adresse.required' => 'Veuillez entrer une adresse.',
            'ponts.required' => 'Veuillez attribuer des points.',
            ]);
            if ($validation->fails())
            return back()->withErrors($validation->errors())->withInput();

        $contenuFormulaire = $validation->validated();

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
            return redirect()->route('consulterClient');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client, int $id)
    {
        $client = User::find($id);
        return view('client/detailClient',[ 'client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(client $client, int $id)
    {
        $client = User::find($id);
        return view('client/editClient',['client' =>$client]);
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
        $validation = Validator::make($request->all(), [
            'tel' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'nom' => 'required',
            'adresse' => 'required',
            'courriel' => 'required',
            'points' => 'required',
            'idClient' => 'required',
            ], [
            // Vous pouvez écrire un message d’erreur distinct par règle de validation fournie plus haut.
            'tel.required' => 'Veuillez entrer un numéro de téléphone.',
            'tel.regex' => 'Le numéro de téléphone ne respecte pas le format attendu.',
            'courriel.required' => 'Veuillez entrer un courriel.',
            'nom.required' => 'Veuillez entrer un nom.',
            'adresse.required' => 'Veuillez entrer une adresse.',
            'ponts.required' => 'Veuillez attribuer des points.',
            ]);
            if ($validation->fails())
            return back()->withErrors($validation->errors())->withInput();

        $contenuFormulaire = $validation->validated();

        $client = User::find($contenuFormulaire['idClient']);

        $client->name = $contenuFormulaire['nom'];
        $client->telephone = $contenuFormulaire['tel'];
        $client->adresse = $contenuFormulaire['adresse'];
        $client->email = $contenuFormulaire['courriel'];

        if ($client->save())
        {
           $request->session()->flash('succes', 'La modification du client a bien fonctionné.');

            return redirect()->route('consulterClient');

        }
        else
        {
            $request->session()->flash('erreur', 'La modification du client n\'a pas fonctionné.');
            redirect()->route('consulterClient');
        }
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
