<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;//recupere les données d'authentication
use App\Models\Produit;
use App\Models\transaction;
use App\Models\ProduitTransaction;
use App\Models\Mode_paiement;
use App\Models\Transaction as ModelsTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Models\User;
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
            return view('commande/listerCommandes',[
                'commandes' => Transaction::All(),
                'users'=> User::All() ]);
        }
        if ($request->routeIs('consulterCommande')) {
            return view('commande/consulterCommande');
        }

        if ($request->routeIs('extraitCommande')) {
            $commande = $request->all();
            //return response()->json(['message' => 'Objeto recebido com sucesso!', 'data' => $commande]);
            return view('commande/extraitCommande',[
                'commande' => $commande,
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

        $commande = Transaction::find($id);

        $elements = Transaction::with('produit')
                    ->where('id_transaction','=',$id)
                    ->get();

        foreach($elements->produit as $produit) {

            $produitTransaction = ProduitTransaction::find('id_transaction');

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
