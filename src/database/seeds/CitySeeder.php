<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('city')->delete();

        $cities = [
            ['name' => 'Szeged','county_id' => 1],
            ['name' => 'Hódmezővásárhely','county_id' => 1],
            ['name' => 'Csongrád','county_id' => 1],
            ['name' => 'Gyomaendrőd','county_id' => 2],
        ];

        App\Models\City::insert($cities);
    }

}
