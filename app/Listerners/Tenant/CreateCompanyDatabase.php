<?php

namespace App\Listerners\Tenant;

use App\Events\Tenant\CompanyCreated;
use App\Events\Tenant\DatabaseCreated;
use App\Tenant\Database\DatabaseMananger;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateCompanyDatabase
{
    private $databaseMananger;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(DatabaseMananger $databaseMananger)
    {
        $this->databaseMananger = $databaseMananger;
    }

    /**
     * @param \App\Events\Tenant\CompanyCreated $event
     * @throws \Exception
     */
    public function handle(CompanyCreated $event)
    {
        $company = $event->getCompany();

        if(!$this->databaseMananger->createDatabase($company)){
            throw new \Exception('Error create Database');
        };

        // run migrations
        event(new DatabaseCreated($company));
    }
}
