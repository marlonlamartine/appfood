<?php

use App\Models\{Plan, Tenant};
use Illuminate\Database\Seeder;

class TenantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '02885915340',
            'name' => 'Lamart Enterprise',
            'url' => 'lamartenterprise',
            'email' => 'admin@email.com'
        ]);
    }
}
