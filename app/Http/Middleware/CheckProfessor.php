<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Professor;
use Illuminate\Support\Facades\Auth;

class CheckProfessor
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
        $professor = Professor::select('id')->where('user_id', Auth::user()->id)->first();
        
        if ($professor)
        {
            return $next($request);
        } else
        {
            return redirect('/home');
        }
    }
}
