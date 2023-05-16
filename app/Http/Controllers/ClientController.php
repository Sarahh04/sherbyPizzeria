<?php
/*****************************************************************************
 Fichier : ClientController
 Auteur : Sarah Diakite
 Fonctionnalité : permet de gerer l'affichage, l'ajout et la modification des
 clients.
*****************************************************************************/
namespace App\Http\Controllers;

use App\Models\client;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationNewClient;
use App\Http\Resources\ClientResource;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->routeIs('consulterClient'))
        {
            $clients = User::Where(['id_role' => 2, 'actif' => 1])->get();
            return view('client/listeClients',['clients' => $clients]);
        }

        if($request->routeIs('filtrerClients'))
        {
            $nom = $request->input('nom');
            $tel = $request->input('tel');
            $courriel = $request->input('courriel');

            $clients = User::where('id_role' ,'=',2)
                        ->where( 'actif','=', 1);


            if($nom != null )
            {
                $clients->where('name','like',$nom);
            }

            if( $tel != null )
            {
                $clients->where('telephone','like',$tel);
            }

            if( $courriel != null)
            {
                $clients->where('email','like',$courriel);
            }

            $results = $clients->get();

            if($results != null)
            {
                return response()->json(['users' => $results], 200);
            }
            else
            {
                return response()->json("Aucun client trouvé", 200);
            }
        }

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
        if ($request->routeIs('addClientApi'))
        {
            $validation = Validator::make($request->all(), [
                'nom' => 'required',
                'courriel' => 'required',
                'telephone' => 'required',
                'adresse' => 'required',
                'mdp' => 'required',
                ], [
                'nom.required' => 'Veuillez entrer un nom de client.',
                'courriel.required' => 'Veuillez entrer un courriel pour le client.',
                'telephone.required' => 'Veuillez entrer un telephone pour le client.',
                'adresse.required' => 'Veuillez inscrire une adresse pour le client.',
                'mdp.required' => 'Veuillez entrer un mot de passe.'
                ]);
                if ($validation->fails()) {
                    return response()->json(['ERREUR' => $validation->errors()], 400);
                }

                $contenuDecode = $validation->validated();

                try {
                    User::create([
                    'name' => $contenuDecode['nom'],
                    'email' => $contenuDecode['courriel'],
                    'telephone' => $contenuDecode['telephone'],
                    'adresse' => $contenuDecode['adresse'],
                    'id_role' => 2,
                    'password' => Hash::make($contenuDecode['mdp'])
                ]);
                } catch (QueryException $erreur) {
                report($erreur);
                return response()->json(['ERREUR' => 'Le client n\'a pas été ajouté.'], 500);
                }

                return response()->json(['SUCCES' => 'Le client a bien été ajouté.'], 200);

        }
        else
        {
            $validation = Validator::make($request->all(), [
                'tel' => ['required', 'regex:/^([0-9]{3}[0-9]{3}[0-9]{4})$|^([0-9]{3}-[0-9]{3}-[0-9]{4}|[0-9]{3}\.[0-9]{3}\.[0-9]{4}$|^([0-9]{3})[0-9]{3}-[0-9]{4}$|^[(][0-9]{3}[)][0-9]{3}(-|\.)[0-9]{4})$/i'],
                'adresse' => 'required',
                'courriel' => 'required|regex:/^[\w\W]+@[a-z0-9]*\.[a-z0-9]*$/',
                'points' => 'required',
            ], [
                // Vous pouvez écrire un message d’erreur distinct par règle de validation fournie plus haut.
                'tel.required' => 'Veuillez entrer un numéro de téléphone.',
                'tel.regex' => 'Le numéro de téléphone ne respecte pas le format attendu.',
                'courriel.required' => 'Veuillez entrer un courriel.',
                'courriel.regex' => 'Le courriel ne respecte pas le format attendu.',
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

            $clients = User::Where(['id_role' => 2, 'actif' => 1])->get();

            Mail::to($request->user())->send(new ConfirmationNewClient($user));

            return view('client/listeClients',['clients' => $clients]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ?int $id = null)
    {
        if ($request->routeIs('clientApi'))
        {
            $client = auth()->user();

            if (empty($client))
                return response()->json(['ERREUR' => 'Le client demandé est introuvable.'], 400);

            return new ClientResource($client);
        }
        else
        {
            $client = User::find($id);
            return view('client/detailClient',[ 'client' => $client]);
        }

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
            'tel' => ['required', 'regex:/^([0-9]{3}[0-9]{3}[0-9]{4})$|^([0-9]{3}-[0-9]{3}-[0-9]{4}|[0-9]{3}\.[0-9]{3}\.[0-9]{4}$|^([0-9]{3})[0-9]{3}-[0-9]{4}$|^[(][0-9]{3}[)][0-9]{3}(-|\.)[0-9]{4})$/i'],
            'nom' => 'required',
            'adresse' => 'required',
            'courriel' => 'required|regex:/^[\w\W]+@[a-z0-9]*\.[a-z0-9]*$/',
            'points' => 'required',
            'idClient' => 'required',
            ], [
            // Vous pouvez écrire un message d’erreur distinct par règle de validation fournie plus haut.
            'tel.required' => 'Veuillez entrer un numéro de téléphone.',
            'tel.regex' => 'Le numéro de téléphone ne respecte pas le format attendu.',
            'courriel.required' => 'Veuillez entrer un courriel.',
            'courriel.regex' => 'Le courriel ne respecte pas le format attendu.',
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
            return redirect()->route('consulterClient');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(client $client, Request $request)
    {
        if ($request->routeIs('supprimerLeClient'))
        {
            $id = $request->input('id');
            $client = User::find($id);
            if($client != null)
            {
                $client->actif = 0;
            }

            $client->save();
            return redirect()->route('consulterClient');
        }
        else
        {
            $id = $request->input('id');

            $client = User::find($id);
            $client->actif = 0;

            if ($client->save())
            {
                http_response_code(200);
            }
            else
            {

                http_response_code(400);
            }
        }



    }
}
