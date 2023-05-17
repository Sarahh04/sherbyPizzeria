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
use App\Models\Mode_paiement;
use App\Models\Transaction as ModelsTransaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use DateTime;
use App\Http\Resources\TransactionResource;

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
        if ($request->routeIs('commandesApi')) {


            return TransactionResource::collection(Transaction::all());
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
                'users' => User::All(),
                'modePaiements' => Mode_paiement::All()
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
        if ($request->routeIs('transactionApi'))
        {
            $validation = Validator::make($request->all(), [
                'id_user' => 'required',
                'id_mode_paiement' => 'required',
                'no_facture' => 'required',
                'date_transaction' => 'required',
                ], [
                'id_user.required' => 'Veuillez entrer un nom de client.',
                'id_mode_paiement.required' => 'Veuillez entrer mode de paiement.',
                'date_transaction.required' => 'Veuillez entrer la date de transaction.'
                ]);
                if ($validation->fails()) {
                    return response()->json(['ERREUR' => $validation->errors()], 400);
                }

                $contenuDecode = $validation->validated();

                try {
                    Transaction::create([
                    'id_user' => $contenuDecode['id_user'],
                    'id_etat_transaction' => 1,
                    'id_mode_paiement' => $contenuDecode['id_mode_paiement'],
                    'id_type_transaction' => 1,
                    'date_transaction' => date(Y/m/d),
                ]);
                } catch (QueryException $erreur) {
                report($erreur);
                return response()->json(['ERREUR' => 'La transaction n\'a pas été ajouté.'], 500);
                }

                return response()->json(['SUCCES' => 'La transaction a bien été ajouté.'], 200);

        }

        $commande = json_decode($request->input('commande'));
        $idClient =  $request->input('idClient');
        $observation = $request->input('observation');
        $mPaiement =  $request->input('mPaiement');


        $transaction = Transaction::create([
            'id_user' => $idClient,
            'id_etat_transaction' => 1,
            'id_mode_paiement' => $mPaiement,
            'id_type_transaction' => 1,
            'no_facture' => 1000 ,
            'date_transaction' => date("Y-m-d H:i:s"),
            'observation'=> $observation
        ]);


        for($i = 0; $i < $commande.count(); $i++)
        {
            $produitTransaction = ProduitTransaction::create([
                                'id_transaction' => $transaction->id_transaction,
                                'id_produit' =>$commande[$i] ,
                                'quantite' => $commande[$i+1]
            ]);
        }

        if($produitTransaction)
        {
            return redirect()->route('detailCommande', ['id' => $commande->id_transaction]);
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
     *@param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, transaction $transaction)
    {
        $id = $request->input('id');

        $transaction = Transaction::find($id);


            if ( $transaction->delete())
            {
                http_response_code(200);
            }
            else
            {

                http_response_code(400);
            }
    }

}
