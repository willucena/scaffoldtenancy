<?php

namespace App\Console\Commands\Tenant;

use App\Models\Company;
use App\Tenant\ManagerTenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class TenantMigrations extends Command
{

    protected  $managerTenant;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrations {id?} { --refresh}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run execute migrations tenants';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ManagerTenant $managerTenant)
    {
        parent::__construct();

        $this->managerTenant = $managerTenant;

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        if($id = $this->argument('id')){

            $company = Company::find($id);

            if($company) {
                return $this->execCommand($company);
            }

        }

        $companies = $this->getCompanies();

        foreach ($companies as $company){

            $this->execCommand($company);
        }

    }

    /**
     * @return \App\Models\Company[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCompanies()
    {
        return Company::all();
    }

    /**
     * @param \App\Models\Company $company
     */
    public function execCommand(Company $company)
    {
        $command = $this->option('refresh') ? 'migrate:refresh' : 'migrate';


        $this->managerTenant->setConnection($company);

        $this->info("Connection Company {$company->name}");

        Artisan::call($command, [
            '--force' => true,
            '--path' => '/database/migrations/tenant',
        ]);

        $this->info("End Connection {$company->name}");
        $this->info('-------------------------------');
    }
}
