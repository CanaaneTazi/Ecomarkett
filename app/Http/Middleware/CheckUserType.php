<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié
        if (Auth::check()) {
            // Vérifier le type de compte de l'utilisateur
            if (Auth::user()->type_compte == 'User') {
                // Rediriger vers une page d'erreur ou une autre route
                return redirect('/')->with('error', 'Vous n\'avez pas accès à cette page.');
            }
        }

        return $next($request);
    }
}
