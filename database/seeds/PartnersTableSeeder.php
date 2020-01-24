<?php

use App\Partner;
use Illuminate\Database\Seeder;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partner::create([
            'name' => 'Hassan',
            'city_id' => 2,
        ]);
        Partner::create([
            'name' => 'Mohamed',
            'city_id' => 1,
        ]);
        Partner::create([
            'name' => 'Nada',
            'city_id' => 3,
        ]);
    }
}
