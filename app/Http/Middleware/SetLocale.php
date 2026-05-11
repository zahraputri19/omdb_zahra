<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika ada session 'locale', gunakan itu. Jika tidak, gunakan default dari config (biasanya 'en')
    if (session()->has('locale')) {
        App::setLocale(session()->get('locale'));
    }
        return $next($request);
    }
}
