<?php

namespace App\Http\Controllers\Tenant;

use App\Events\Tenant\CompanyCreated;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function store()
    {
        $company = $this->company->create([
            'name'=> 'Empresa '. \Faker\Provider\Company::randomNumber(),
            'domain' => \Faker\Provider\Company::randomNumber() . 'scaffoldtenancy.test',
            'bd_database' => 'tenant'. \Faker\Provider\Company::randomNumber(),
            'bd_username' => 'root',
            'bd_hostname' => 'mysql',
            'bd_password' => 'root'
        ]);

        event(new CompanyCreated($company));
        dd($company);
        return $company;
    }
}
