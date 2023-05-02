<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Role;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->routeIs('indexUser'))
        {
            return view('/indexUser');
        }
        if ($request->routeIs('employes'))
        {
            return view('profile/employes', [
                'users' => User::All()
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
        if ($request->routeIs('newEmploye'))
        {
            return view('profile/newEmploye', [
                'roles' => Role::All()
            ]);
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required', 'max:255',
            'email' => 'required', 'email', 'max:255', 'unique:'.User::class,
            'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'adresse' => 'required', 'max:255',
            'naissance' => 'required', 'date',
            'password' => 'required', 'confirmed', Rules\Password::defaults(),
            'poste' => 'required', 'max:255',
            'embauche' => 'required', 'date',
            'specimen' => 'max:255',
            'role' => 'required',
        ],
        [
            // Vous pouvez écrire un message d’erreur distinct par règle de validation fournie plus haut.
            'name.required' => 'Veuillez entrer le nom de employé.',
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'email.required' => 'Veuillez entrer un courriel.',
            'email.max' => 'Le courriel ne peut pas dépasser 255 caractères.',
            'telephone.required' => 'Veuillez entrer un numéro de téléphone.',
            'telephone.regex' => 'Le numéro de téléphone ne respecte pas le format attendu.',
            'telephone.min' => 'Le numéro de téléphone doit comporter au moins 10 caractères.',
            'adresse.required' => 'Veuillez entrer ladresse de employé.',
            'adresse.max' => 'Ladresse ne peut pas dépasser 255 caractères.',
            'naissance.required' => 'Veuillez entrer la date de naissance de lemployé.',
            'password.required' => 'Veuillez entrer un mot de passe.',
            'password.confirmed' => 'Les deux mot de passe doivent être identique.',
            'poste.required' => 'Veuillez entrer le poste de employé.',
            'poste.max' => 'Le poste ne peut pas dépasser 255 caractères.',
            'embauche.required' => 'Veuillez entrer la date dembauche de employé.',
            'role.required' => 'Veuillez donner aumoins un role.'
        ]);

        if ($validation->fails())
            return back()->withErrors($validation->errors())->withInput();
        else
        {
            $contenuFormulaire = $validation->validated();
            $passHash = Hash::make($contenuFormulaire['password']);

            $user = new User;
            $user->name = $contenuFormulaire['name'];
            $user->email = $contenuFormulaire['email'];
            $user->telephone = $contenuFormulaire['telephone'];
            $user->adresse = $contenuFormulaire['adresse'];
            $user->naissance = $contenuFormulaire['naissance'];
            $user->password = $passHash;
            $user->id_role = $contenuFormulaire['role'];
            $user->poste = $contenuFormulaire['poste'];
            $user->date_embauche = $contenuFormulaire['embauche'];
            $user->specimen_cheque = $contenuFormulaire['specimen'];

            $user->save();


            return view('profile/confirmAddEmploye', [
                'user' => $user
            ]);
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $id)
    {

        if ($request->routeIs('employe')) {

            $user = User::find($id);

            if (is_null($user))
                return abort(404); // Redirige automatiquement vers la page "404 – Not found".

            return view('profile/employe', [
                'user' => $user
            ]);
        }
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request, int $id): View
    {
        if($request->routeIs('modificationEmploye')) {

            $user = User::find($id);
            $roles = Role::All();

            if (is_null($user))
                return abort(404); // Redirige automatiquement vers la page "404 – Not found".

            return view('profile/editEmploye', [
                'user' => $user,
                'roles' => $roles
            ]);

        }
        else{
            return view('profile.edit', [
                'user' => $request->user(),
            ]);
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, int $id)
    {
        if($request->routeIs('enregistrementEmploye')){

            $validation = Validator::make($request->all(), [
                'name' => 'required', 'max:255',
                'email' => 'required', 'email', 'max:255', 'unique:'.User::class,
                'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'adresse' => 'required', 'max:255',
                'naissance' => 'required', 'date',
                'poste' => 'required', 'max:255',
                'embauche' => 'required', 'date',
                'specimen' => 'max:255',
            ],
            [
                'name.required' => 'Veuillez entrer le nom de employé.',
                'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
                'email.required' => 'Veuillez entrer un courriel.',
                'email.max' => 'Le courriel ne peut pas dépasser 255 caractères.',
                'telephone.required' => 'Veuillez entrer un numéro de téléphone.',
                'telephone.regex' => 'Le numéro de téléphone ne respecte pas le format attendu.',
                'telephone.min' => 'Le numéro de téléphone doit comporter au moins 10 caractères.',
                'adresse.required' => 'Veuillez entrer ladresse de employé.',
                'adresse.max' => 'Ladresse ne peut pas dépasser 255 caractères.',
                'naissance.required' => 'Veuillez entrer la date de naissance de lemployé.',
                'poste.required' => 'Veuillez entrer le poste de employé.',
                'poste.max' => 'Le poste ne peut pas dépasser 255 caractères.',
                'embauche.required' => 'Veuillez entrer la date dembauche de employé.',
            ]);

            if ($validation->fails())
            {
                return back()->withErrors($validation->errors())->withInput();
            }

            else
            {
                $contenuFormulaire = $validation->validated();

                // On crée une nouvelle instance du modèle (de la classe) "Commentaire"
                $user = User::find($id);

                $user->name = $contenuFormulaire['name'];
                $user->email = $contenuFormulaire['email'];
                $user->telephone = $contenuFormulaire['telephone'];
                $user->adresse = $contenuFormulaire['adresse'];
                $user->naissance = $contenuFormulaire['naissance'];
                $user->poste = $contenuFormulaire['poste'];
                $user->id_role = $contenuFormulaire['role'];
                $user->date_embauche = $contenuFormulaire['embauche'];
                $user->specimen_cheque = $contenuFormulaire['specimen'];

                // On enregistre les informations dans la base de données à partir de l’instance
                // du modèle (de la classe) "Commentaire" créée précédemment.
                $user->save();

                return view('profile/employes', [
                    'users' => User::All()
                ]);
            }

        }
        else{

            $request->user()->fill($request->validated());

            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }

            $request->user()->save();

            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
