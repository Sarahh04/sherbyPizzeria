<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $utilisateur = $request->user();

        if ($utilisateur !== null)
        {
            if ($utilisateur->role->nom === 'Administrateur')
            {
                return $next($request);
            }

            if ($request->bearerToken() && $request->accepts('application/json')) {
                return back()->json(['ERREUR' => 'Vous devez être authentifié avec un compte administrateur pour utiliser cette fonctionnalité.'], 400);
            }
            else
            {
                return redirect()->back()->with('alerte', 'Vous devez être authentifié avec un compte administrateur pour utiliser cette fonctionnalité.');
            }
        }
    }
}
