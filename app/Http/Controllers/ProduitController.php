<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Models\CategorieProduit;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProduitResource;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->routeIs('promotions')) {
            return view('promotion/promotions', [
                // D’autres paramètres peuvent être passés à la vue en les séparant par une virgule.
                //'produits' => Produit::All()
            ]);
        } else {
            return view('produits/gestionInventaire', [
                'produits' => Produit::all(),
                'categories' => CategorieProduit::all()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->routeIs('newPromotion')) {
            return view('promotion/newPromotion', []);
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
        if ($request->routeIs('gestionProduits')) {
            return view('produits/gestionMenu', [
                'produits' => Produit::all(),
                'categories' => CategorieProduit::all()
            ]);
        } else {

            $contenuDecode = $request->all();

            try {
                Produit::create([
                    'nom' => $contenuDecode['nom'],
                    'prix' => $contenuDecode['prix'] ?? 0,
                    'delais' => $contenuDecode['delais'] ?? '',
                    'quantite' => $contenuDecode['qty'],
                    'promo_courante' => 0,
                    'description' => $contenuDecode['description'] ?? '',
                    'id_categorie' => $contenuDecode['categorie']
                ]);
            } catch (QueryException $erreur) {
                report($erreur);
                return response()->json(['ERREUR' => 'Le produit n\'a pas été ajouté.'], 500);
            }

            return view('produits/gestionInventaire', [
                'produits' => Produit::all(),
                'categories' => CategorieProduit::all()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        if ($request->routeIs('search')) {
            return view('produits/gestionInventaire', [
                'produits' => Produit::where('nom', $request->nom)->get(),
                'categories' => CategorieProduit::all()

            ]);
        } elseif ($request->routeIs('modifierBdProduit')) {
            $produit = Produit::find($request->id);

            // Check if the value is not null before updating
            if (!is_null($request->nom)) {
                $produit->nom = $request->nom;
            }

            if (!is_null($request->prix)) {
                $produit->prix = $request->prix;
            }

            if (!is_null($request->delais)) {
                $produit->delais = $request->delais;
            }

            if (!is_null($request->qty)) {
                $produit->quantite = $request->qty;
            }

            // Set promo_courante to 0 unconditionally
            $produit->promo_courante = 0;

            if (!is_null($request->description)) {
                $produit->description = $request->description;
            }

            if (!is_null($request->categorie)) {
                $produit->id_categorie = $request->categorie;
            }

            // Save the changes to the database
            $produit->save();

            return view('produits/gestionInventaire', [
                'produits' => Produit::all(),
                'categories' => CategorieProduit::all()
            ]);
        } elseif ($request->routeIs('delProduits')) {
            return view('produits/deleteProduit', [
                'id' => $request->id,
                'produits' => Produit::find($request->id),
                'categories' => CategorieProduit::all()
            ]);
        } else {
            return view('produits/modifProduit', [
                'id' => $request->id,
                'produits' => Produit::find($request->id),
                'categories' => CategorieProduit::all()
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit, Request $request)
    {

        if ($request->routeis("supprimerProduit")) {


            $user = Produit::find($request->id);
            $user->delete();

            if ($user->delete()) {
                http_response_code(200);
            } else {

                http_response_code(400);
            }

            return view('produits/gestionInventaire', [
                'produits' => Produit::all(),
                'categories' => CategorieProduit::all()
            ]);
        }
    }
}
