<?php

namespace App\Http\Middleware\Tenant;

use Closure;
use Illuminate\Http\Request;

class NotDomainMain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $domainRequest = $request->getHost();
        $domainMain = config('tenant.domain_main');

        if( $domainRequest == $domainMain){
            abort(401, 'Acesso não permitido!');
        }

        return $next($request);
    }
}
