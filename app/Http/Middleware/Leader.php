<?php

namespace App\Http\Middleware;
use Alert;
use Closure;

class Leader
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
        if($request->user()->role =='0'){
            return $next($request);
        }
        else{
            $role = $request->user()->role;
            if($role == 0){
                Alert::error('Akses Ditolak', 'Anda tidak memiliki Akses!');
                return redirect()->route('leader');
            }elseif($role == 1){
                Alert::error('Akses Ditolak', 'Anda tidak memiliki Akses!');
                return redirect()->route('cw');
            }else{
                Alert::error('Akses Ditolak', 'Anda tidak memiliki Akses!');
                return redirect()->route('designer');
            }
        }
    }
}
