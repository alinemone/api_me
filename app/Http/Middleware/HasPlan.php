<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasPlan
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
        if (!auth()->check()){
            return redirect('code');
        }
        
        $user = auth()->user()->with('order')->first();

        if (is_null($user->order)){
            return redirect('code');
        }

        return $next($request);
    }
}
