<?php

namespace App\Http\Middleware\Tenant;

use Closure;
use Illuminate\Http\Request;

/**
 * Esse midleware cria um novo diretorio para cada tenant
 * Assim mantem a integridade dos arquivos por tenants ou seja não corre o
 * risco de uma empresa substituir os arquivos de outra
 * nomes do diretórios é um "uuid" ver na Model Company como
 * é gerado o uuid
 *
 * Class TenantFilesystems
 *
 * @package App\Http\Middleware\Tenant
 */
class TenantFilesystems
{
    /**

     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( $request->getHost() != config('tenant.domain_main')){
            $this->setConfigFiles();
        }

        return $next($request);
    }

    /**
     * Cria as configurações por empresa
     */
    public function setConfigFiles()
    {
        $uuid = session('company')['uuid'];
        config()->set([
            'filesystems.disks.tenant.root' => config(   'filesystems.disks.tenant.root') . "/{$uuid}",
            'filesystems.disks.tenant.url' => config(   'filesystems.disks.tenant.url') . "/{$uuid}"
        ]);
    }
}
