<?php

use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('county')->delete();

        $counties = [
            ['name' => 'Csongrád-Csanád'],
            ['name' => 'Baranya'],
            ['name' => 'Békés'],
        ];

        App\Models\County::insert($counties);
    }
}
