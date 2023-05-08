<?php
/*****************************************************************************
 Fichier : TransictionController
 Auteur : Claudio Cruz
 Fonctionnalité : permet de gerer l'affichage, l'ajout et la modification des
 commandes.
*****************************************************************************/
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;//recupere les données d'authentication
use App\Models\Produit;
use App\Models\transaction;
use App\Models\ProduitTransaction;
use App\Models\Transaction as ModelsTransaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use DateTime;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->routeIs('listerCommandes')) {

            if($request->FiltreNoCommande != null){
                $commande = $request->input('FiltreNoCommande');
            }
            return view('commande/listerCommandes',[
                'commandes' => Transaction::All(),
                'users'=> User::All() ]);
        }

        if ($request->routeIs('consulterCommande')) {
            return view('commande/consulterCommande');
        }

        if($request->routeIs('filtrerCommandes'))
        {
            $nom = $request->input('nom');
            $tel = $request->input('tel');
            $noCommande = $request->input('noCommande');
            $dateDebut = $request->input("date_transaction");
            $dateFin = $request->input("date_transaction");

            $commandes = Transaction::All();

            if($nom != null )
            {
                $commandes->where('name','=',$nom);
            }

            if( $tel != null )
            {
                $commandes->where('telephone','=',$tel);
            }

            if( $noCommande != null)
            {
                $commandes->where('no_facture','=',$noCommande);
            }

            if($dateDebut != null)
            {
                $commandes->where('date_transaction','>=',$dateDebut);
            }

            if($dateFin != null)
            {
                $commandes->where('date_transaction','<=',$dateFin);
            }

            $results = $commandes->get();

            if($results != null)
            {
                return response()->json(['commandes' => $results], 200);
            }
            else
            {
                return response()->json("Aucune commande trouvé", 200);
            }
        }

        if ($request->routeIs('extraitCommande')) {

            $data = $request->$_POST['data'];
            //$data = json_decode($request->input('data'));

            return view('commande/extraitCommande',[
                'commande' => $data,
                'produits' => Produit::All(),
                'users'=> User::All() ]);
        }

        if ($request->routeIs('resumeCommande')) {
            $contenueForm = $request->all();

            return view('commande/resumeCommande',[
                'user' => User::All(),
                'produits' => Produit::All(),
                'users'=> User::All() ]);
        }
        else{
            return view('commande/gestionCommandes');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->routeIs('ajouterCommande')) {
            return view('commande/ajouterCommande',[
                'produits' => Produit::All(),
                'users' => User::All()
            ]);
        }

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
            'tel' => ['required', 'regex:/^([0-9]{3}[0-9]{3}[0-9]{4})$|^([0-9]{3}-[0-9]{3}-[0-9]{4}|[0-9]{3}\.[0-9]{3}\.[0-9]{4}$|^([0-9]{3})[0-9]{3}-[0-9]{4}$|^[(][0-9]{3}[)][0-9]{3}(-|\.)[0-9]{4})$/i'],
            'nom' => 'required',
            'observation' => 'max:250',
            'quantite' => 'regex:/^[1-9][0-9]*$/gm]',
            ], [
            // Vous pouvez écrire un message d’erreur distinct par règle de validation fournie plus haut.
            'tel.required' => 'Veuillez entrer un numéro de téléphone.',
            'tel.regex' => 'Le numéro de téléphone ne respecte pas le format attendu.',
            'nom.required' => 'Veuillez entrer un nom.',
            'observation.max' => 'Votre commentaire de ne peut pas dépasser 250 caractères.',
            'quantite.regex' => 'Veuillez attribuer des points.',
        ]);

        if ($validation->fails())
            return back()->withErrors($validation->errors())->withInput();

        $contenuFormulaire = $validation->validated();

        $commande = Transaction::create([
            'id_user' => Auth::id(),
            'id_etat_transaction' => 1,
            'id_mode_payement' => 1,
            'id_type_transaction' => 1,
            'no_facture' => 7777,
            'date_transaction' => date("Y-m-d H:i:s"),
            'observation'=> $request->observation
        ]);

        foreach($request->produit as $produit) {

            $produitTransaction = ProduitTransaction::create([
                                'id_transaction' => $commande->id_transaction,
                                'id_produit' => $produit->id_produit,
                                'quantite' => $produit->pivot->quantite
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $id)
    {
        if ($request->routeIs('detailCommande')) {
            $transaction = Transaction::find($id);
            if (is_null($transaction))
                return abort(404); // Redirige automatiquement vers la page "404 – Not found".
            return view('commande/detailCommande', [
                'commande' => $transaction,
                'elements' => Transaction::with('produit')
                    ->where('id_transaction','=',$id)
                    ->get()
            ]);

        }
        if ($request->routeIs('editerCommande')) {
            $transaction = Transaction::find($id);
            if (is_null($transaction))
                return abort(404); // Redirige automatiquement vers la page "404 – Not found".
            return view('commande/editerCommande', [
                'commande' => $transaction,
                'produits' => Produit::All(),
                'elements' => Transaction::with('produit')
                    ->where('id_transaction','=',$id)
                    ->get()
            ]);

        }

        if ($request->routeIs('extraitCommande')) {

            $data = $request->all();

            return view('commande/extraitCommandeId',[
                'commande' => $data,
                'produits' => Produit::All(),
                'users'=> User::All() ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, int $id)
    {
        $transaction = Transaction::find($id);
        if ($request->routeIs('extraitCommande')) {
            return view('commandes/extraitCommande',[
                'commande' => $transaction,
                'produits' => Produit::All(),
                'users'=> User::All() ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validation = Validator::make($request->all(), [
            'tel' => ['required', 'regex:/^([0-9]{3}[0-9]{3}[0-9]{4})$|^([0-9]{3}-[0-9]{3}-[0-9]{4}|[0-9]{3}\.[0-9]{3}\.[0-9]{4}$|^([0-9]{3})[0-9]{3}-[0-9]{4}$|^[(][0-9]{3}[)][0-9]{3}(-|\.)[0-9]{4})$/i'],
            'nom' => 'required',
            'observation' => 'max:250',
            'quantite' => 'regex:/^[1-9][0-9]*$/gm]',
            ], [
            // Vous pouvez écrire un message d’erreur distinct par règle de validation fournie plus haut.
            'tel.required' => 'Veuillez entrer un numéro de téléphone.',
            'tel.regex' => 'Le numéro de téléphone ne respecte pas le format attendu.',
            'nom.required' => 'Veuillez entrer un nom.',
            'observation.max' => 'Votre commentaire de ne peut pas dépasser 250 caractères.',
            'quantite.regex' => 'Veuillez attribuer des points.',
        ]);

        if ($validation->fails())
        return back()->withErrors($validation->errors())->withInput();

        $contenuFormulaire = $validation->validated();

        $commande = Transaction::find($contenuFormulaire['id']);

        $elements = Transaction::with('produit')
                    ->where('id_transaction','=',$id)
                    ->get();

        foreach($elements->produit as $produit) {

            $produitTransaction = ProduitTransaction::find('id');

            $produitTransaction->id_produit = $commande['id_produit'];
            $produitTransaction->quantite = $commande['quantite'];

        }

        if ($produitTransaction->save())
            session()->now('succes', 'La modification de la commande a bien fonctionné.');
        else
            session()->now('erreur', 'La modification de la commande n\'a pas fonctionné.');

        return view('commande/listerCommandes',[
            'commandes' => Transaction::All(),
            'users'=> User::All() ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $id)
    {

        $commande = Transaction::find($id);
        $commande->id_etat_transaction = 3;

        $elements = ProduitTransaction::with('transaction')
                    ->where('id_transaction','=',$id)
                    ->get();

        foreach($elements as $element) {
            $element->delete();
        }

        if ($commande->delete())
        {
            http_response_code(200);
        }
        else
        {
            http_response_code(400);
        }
        return view('commande/listerCommandes',[
            'commandes' => Transaction::All(),
            'users'=> User::All() ]);

    }

}
