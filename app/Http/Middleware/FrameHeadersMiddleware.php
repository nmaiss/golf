<?php

namespace App\Http\Middleware;
use Closure;

public function handle($request, Closure $next)
{
     $response = $next($request);
     $response->header('X-Frame-Options', 'ALLOW FROM https://freegolf.fr/');
     return $response;
 }
