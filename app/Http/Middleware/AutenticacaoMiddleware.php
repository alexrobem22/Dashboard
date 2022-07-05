<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
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
        session_start();

        if (isset($_SESSION['email']) && $_SESSION['email'] != '' && $_SESSION['cargo'] == 'adm') {
            return $next($request);
        } else {
            $erro = 2;
            return redirect()->route('login',compact('erro'));
        }




    }
}
