<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogAcessoMiddleware
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
        return $next($request);
    }
}

//obs
/**
 * dd($request)
 * $ip = $request->server->get('REMOTE_ADDR'); //aqui eu to recuperando o ip
 *
 * retuperando a rota direto
 * $rota = $request->getRequestUri();
 */
