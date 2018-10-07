<?php

use Illuminate\Database\Seeder;

class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $zones = [
                ['name' =>  'Delta Fox',         'description' => 'Medicina'],
                ['name' =>  'Delta Horse',         'description' => 'CCO'],
                ['name' =>  'Delta Dog',         'description' => 'Artes'],
                ['name' =>  'Delta Cat',         'description' => 'Educação fisica'],

        ];


        foreach ($zones as $zone) {
            \App\Entities\Zone::create($zone);
        }

    }
}

