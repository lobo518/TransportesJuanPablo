<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUsername
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    // Verifica si el usuario actual tiene el nombre de usuario específico
    if (auth()->check() && auth()->user()->username === 'admin') {
      return $next($request);
    }

    // Si no tiene permiso, redirige a otra ruta o muestra un mensaje de error
    return redirect()->route('DashboardIndex');
  }
}
