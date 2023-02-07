<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBan
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
    if ($request->path() == "banned") {
      return !$request->user()->is_banned ? redirect('dashboard') : $next($request);
    }

    return $request->user()->is_banned ? redirect('banned') : $next($request);
  }
}
