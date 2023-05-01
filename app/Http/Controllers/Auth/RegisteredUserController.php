<?php

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
            'adresse' => ['required', 'string', 'max:255'],
            'naissance' => ['required', 'string', 'date'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'poste' => ['required', 'string', 'max:255'],
            'date_embauche' => ['required', 'string', 'date'],
            'specimen_cheque' => ['string', 'max:255'],
            'roles' => ['required', 'array', 'min:1'],
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
        ]);

        $user->roles()->attach($request->roles);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
