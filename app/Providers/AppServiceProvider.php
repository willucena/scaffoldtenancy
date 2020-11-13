<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->controlTenant();
    }

    public function controlTenant()
    {
        //Criando directiva para o blade
        Blade::if('tenant', function (){
            return request()->getHost() != config('tenant.domain_main');
        });

        Blade::if('domainmain', function (){
          return request()->getHost() == config('tenant.domain_main');
        });
    }
}
