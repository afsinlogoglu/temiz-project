<?php

namespace App\Http\Middleware;

use Closure;

class OrderCheck
{

    public function handle($request, Closure $next)
    {
        if(count($courier_orders->orders) > 10){
            return 'Courier is busy';
        }
        return $next($request);
    }
}
