<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class IsSub
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

      if(auth()->check() && $request->user()->admin == 1)
      {
          return redirect()->guest('accessdenied');
      }
      else if(auth()->check() && $request->user()->admin == 3)
      {
          return redirect()->guest('accessdenied');
      }
      else if(auth()->check() && $request->user()->admin == 4)
      {
          return redirect()->guest('accessdenied');
      }
      else if(auth()->check() && $request->user()->admin == 5)
      {
          return redirect()->guest('accessdenied');
      }
      return $next($request);


    }
}
