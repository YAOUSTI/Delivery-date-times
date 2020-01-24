<?php

use App\City;
use App\Partner;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'id' => 1,
            'name' => 'Rabat',
            'slug' => 'rabat-city'
        ]);


        City::create([
            'id' => 2,
            'name' => 'Casa',
            'slug' => 'casa-city'
        ]);



        City::create([
            'id' => 3,
            'name' => 'Tangier',
            'slug' => 'tangier-city'
        ]);
    }
}
