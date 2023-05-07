<?php
/*****************************************************************************
 Fichier : RegisteredUserController
 Auteur : Amélie Fréchette
 Fonctionnalité : Cette page permaitait d'ajouter un utilisateur mais de la
 manière a laravel avec le lien register. ce lien a été cacher par la suite
 puisqu'il ne correspondait pas a ce que l'on voulais pour le site
*****************************************************************************/

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\role;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth/register', [
            'roles' => Role::All()
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'telephone' =>['required', 'string', 'phone', 'max:255',],
            'adresse' => ['string', 'max:255'],
            'naissance' => ['string', 'date'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'poste' => ['string', 'max:255'],
            'date_embauche' => ['string', 'date'],
            'specimen_cheque' => ['string', 'max:255'],
            'role' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'naissance' => $request->naissance,
            'password' => Hash::make($request->password),
            'poste' => $request->poste,
            'date_embauche' => $request->embauche,
            'specimen_cheque' => $request->specimen,
            'role' => $request->role,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function show(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'courriel' => 'required|email',
            'mot_de_passe' => 'required',
            'nom_token' => 'required'
        ],
        [
            'courriel.required' => 'Veuillez entrer le courriel de l\'utilisateur.',
            'courriel.email' => 'Le courriel de l\'utilisateur doit être valide.',
            'mot_de_passe.required' => 'Veuillez entrer le mot de passe de l\'utilisateur.',
            'nom_token.required' => 'Veuillez inscrire le nom souhaité pour le token.'
        ]);

        if ($validation->fails())
            return response()->json(['ERREUR' => $validation->errors()], 400);

        $contenuDecode = $validation->validated();
        $utilisateur = User::where('email', '=', $contenuDecode['courriel'])->first();

        if (($utilisateur === null) || !Hash::check($contenuDecode['mot_de_passe'], $utilisateur->password))
            return response()->json(['ERREUR' => 'Informations d\'authentification invalides'], 500);

        return response()->json(
            ['SUCCÈS' => $utilisateur->createToken($contenuDecode['nom_token'])->plainTextToken], 200
        );
    }
}
