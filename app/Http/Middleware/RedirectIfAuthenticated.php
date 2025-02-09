<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = $guards ?: [null];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();
                if ($user) {
                    if ($user->role === 'admin') { // Vérifie si l'utilisateur est un administrateur
                        return redirect()->route('dashboard');
                    } else {
                        return redirect()->route('home');
                    }
                } else {
                    // Logique si l'utilisateur n'est pas trouvé (problème potentiel)
                    return redirect()->route('login'); // Ou une autre redirection appropriée
                }
            }
        }

        return $next($request);
    }
}
