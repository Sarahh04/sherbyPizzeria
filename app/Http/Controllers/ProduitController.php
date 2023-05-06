<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Models\Categorie;
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
                'produits' => Produit::all()
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
                'produits' => Produit::all()
            ]);
        } else {

            $contenuDecode = $request->all();

            try {
                Produit::create([
                    'id_produit' => Str::random(6),
                    'nom' => $contenuDecode['nom'],
                    'prix' => 10.99,
                    'delais' => 10,
                    'quantite' => $contenuDecode['qty'],
                    'promo_courante' => $contenuDecode['utility'],
                    'description' => 'bonjour test',
                    'id_categorie' => 1
                ]);
            } catch (QueryException $erreur) {
                report($erreur);
                return response()->json(['ERREUR' => 'Le produit n\'a pas été ajouté.'], 500);
            }

            return view('produits/gestionInventaire', [
                'produits' => Produit::all()
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
                'produits' => Produit::where('nom', $request->nom)->get()
            ]);
        } elseif ($request->routeIs('modifierBdProduit')) {
            $produit = Produit::find($request->id);

            // Update the record's attributes
            $produit->nom = 'New name';
            $produit->description = 'New description';
            $produit->prix = 10.99;

            // Save the changes to the database
            $produit->save();

            return view('produits/gestionInventaire', [
                'produits' => Produit::all()
            ]);
        } else {
            return view('produits/modifProduit', [
                'id' => $request->id,
                'produits' => Produit::all()
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        //
    }
}
