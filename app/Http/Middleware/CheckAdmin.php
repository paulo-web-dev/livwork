<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado e se tem `power` igual a 1
        if (Auth::check() && Auth::user()->power == 1) {
          
            return $next($request);
        }

        // Redireciona para uma rota de acesso negado ou login, caso não seja admin
        return redirect()->route('login')->with('error', 'Acesso negado!');
    }
}
 