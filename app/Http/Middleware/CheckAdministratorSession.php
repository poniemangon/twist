<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckAdministratorSession {
    public function handle($request, Closure $next) {
        if (!Session::has('administrator')) {
            return redirect('twist-administration');
        }

        return $next($request);
    }
}