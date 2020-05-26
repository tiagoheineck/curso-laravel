<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
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
        $professores = Professor::whereNotNull('user_id')
                                                        ->get();
        foreach($professores as $professor){
            if($professor->user_id==Auth::id()){
                return $next($request);
            }else{
                return redirect('home');
            }
        }
        
    }
}
