<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Free', 
            'url'=> 'free',
            'price' => 0,
            'description' => 'Plano Grátis'
        ]);

        Plan::create([
            'name' => 'Business', 
            'url'=> 'business',
            'price' => 499,
            'description' => 'Plano Empresarial'
        ]);
    }
}
