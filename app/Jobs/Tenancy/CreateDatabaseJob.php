<?php

namespace App\Jobs\Tenancy;

use Stancl\Tenancy\Database\DatabaseManager;
use Stancl\Tenancy\Jobs\CreateDatabase;

class CreateDatabaseJob extends CreateDatabase
{
    public function handle(DatabaseManager $dataBaseManager)
    {
        if(!app()->isProduction()){
            (new DeleteDatabaseJob($this->tenant))->handle();
        }

        parent::handle($dataBaseManager);
    }
}
