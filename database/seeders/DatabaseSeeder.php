<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if(tenant()){
            $this->call([
                UserSeeder::class
            ]);
        }else{
            /** @var Tenant $tenant */
            $tenant = Tenant::query()->create([
                'id' => 'company-1',
                'name' => 'company-1',
                'description' => 'this is a first company',
                'logo' => 'https://w7.pngwing.com/pngs/402/36/png-transparent-lorem-ipsum-logo-font-ofset-text-logo-integer.png',
                'email' => 'componay1@example.com',
            ]);
            $tenant->domains()->create(['domain' => 'company-1.localhost']);
            
            /** @var Tenant $tenant */
            $tenant = Tenant::query()->create([
                'id' => 'company-2',
                'name' => 'company-2',
                'description' => 'this is a second company',
                'logo' => 'https://image.similarpng.com/very-thumbnail/2020/12/Lorem-ipsum-logo-isolated-clipart-PNG.png',
                'email' => 'componay2@example.com',
            ]);
            $tenant->domains()->create(['domain' => 'company-2.localhost']);
        }
    }
}
