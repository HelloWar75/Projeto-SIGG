<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * Verifica se o usuário é admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         * Se for administrador prossegue
         */
        if( Auth::user()->role === 2 )
        {
            return $next($request);
        }else{
            /*
             * Retorna erro com código 403 de não autorizado
             */
            return response()->json([
                'error' => 'Unauthorized'
            ], 403);
        }
    }
}
