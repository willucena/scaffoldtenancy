<?php

namespace App\Http\Middleware\Tenant;

use App\Models\Company;
use App\Tenant\ManagerTenant;
use Closure;
use Illuminate\Http\Request;

class TenantMiddleware
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

        $managerTenant = app(ManagerTenant::class);

        if($managerTenant->domainIsMain()){
            return $next($request);
        }

        $company = $this->getCompany($request->getHost());

        if(!$company && $request->url() != route('404.tenant') ){
            return redirect()->route('404.tenant');
        }

        // Só alterna conexão com banco de dados se não for o dominio principal
        if($request->url() != route('404.tenant') && !$managerTenant->domainIsMain()){
            $managerTenant->setConnection($company);
        }

        return $next($request);
    }

    /**
     * Recupera a empresa
     * @param $host
     * @return mixed
     */
    public function getCompany($host)
    {
        return Company::where('domain', $host)->first();
    }
}
