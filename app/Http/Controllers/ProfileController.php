<?php
/*****************************************************************************
 Fichier : ProfileController
 Auteur : Amélie Fréchette
 Fonctionnalité : permet de gerer l'affichage, l'ajout et la modification des
 employer.
*****************************************************************************/

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Request\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Role;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->routeIs('filtrerEmployer'))
        {
            $nom = $request->input('nom');
            $tel = $request->input('tel');
            $courriel = $request->input('courriel');

            $users = User::where('id_role', '<>', 2)
                        ->where('actif', '=', 1);

            if($nom != null )
            {
                $users->where('name','like',$nom);
            }

            if( $tel != null )
            {
                $users->where('telephone','like',$tel);
            }

            if( $courriel != null)
            {
                $users->where('email','like',$courriel);
            }

            $results = $users->get();

            return response()->json(['users' => $results], 200);

        }
        if ($request->routeIs('indexUser'))
        {
            return view('/indexUser');
        }
        if ($request->routeIs('employes'))
        {
            return view('profile/employes', [
                'users' => User::where('id_role', '<>', 2)
                                ->where('actif', '=', 1)
                                ->get()
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
            'email' => ['required', 'regex:/^[\w\W]+@[a-z0-9]*\.[a-z0-9]*$/', 'max:255', 'unique:'.User::class],
            'telephone' => ['required', 'regex:/^([0-9]{3}[0-9]{3}[0-9]{4})$|^([0-9]{3}-[0-9]{3}-[0-9]{4}|[0-9]{3}\.[0-9]{3}\.[0-9]{4}$|^([0-9]{3})[0-9]{3}-[0-9]{4}$|^[(][0-9]{3}[)][0-9]{3}(-|\.)[0-9]{4})$/i'],
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
            'email.regex' => 'Ladresse courriel ne respecte pas le format attendu.',
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

            if ($user->save())
                $request->session()->now('succes', 'L\'ajout de l\'employé a bien fonctionné.');
            else
                $request->session()->now('erreur', 'L\'ajout de l\'employé n\'a pas fonctionné.');

            return view('profile/employes', [
                'users' => User::where('id_role', '<>', 2)
                                ->where('actif', '=', 1)
                                ->get()
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
    public function edit(Request $request, ?int $id = null): View
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

    public function updateProfile(ProfileUpdateRequest $requestP)
    {
        $requestP->user()->fill($requestP->validated());

        if ($requestP->user()->isDirty('email')) {
            $requestP->user()->email_verified_at = null;
        }

        $requestP->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, int $id)
    {

        if($request->routeIs('enregistrementEmploye')){

            $validation = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => ['required', 'regex:/^[\w\W]+@[a-z0-9]*\.[a-z0-9]*$/', 'max:255'],
                'telephone' => ['required', 'regex:/^([0-9]{3}[0-9]{3}[0-9]{4})$|^([0-9]{3}-[0-9]{3}-[0-9]{4}|[0-9]{3}\.[0-9]{3}\.[0-9]{4}$|^([0-9]{3})[0-9]{3}-[0-9]{4}$|^[(][0-9]{3}[)][0-9]{3}(-|\.)[0-9]{4})$/i'],
                'adresse' => 'required|max:255',
                'naissance' => 'required|date',
                'poste' => 'required|max:255',
                'embauche' => 'required|date',
                'specimen' => 'max:255',
                'role' => 'required'
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

                if ($user->save())
                    $request->session()->now('succes', 'La modification de l\'employé a bien fonctionné.');
                else
                    $request->session()->now('erreur', 'La modification de l\'employé n\'a pas fonctionné.');

                return view('profile/employes', [
                    'users' => User::where('id_role', '<>', 2)
                                    ->where('actif', '=', 1)
                                    ->get()
                ]);
            }
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        if($request->routeis("supprimerUnEmploye"))
        {
            $id = $request->input('id');

            $user = User::find($id);
            $user->actif = 0;

            if ($user->save())
            {
                http_response_code(200);
            }
            else
            {

                http_response_code(400);
            }
        }
        else
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
}
