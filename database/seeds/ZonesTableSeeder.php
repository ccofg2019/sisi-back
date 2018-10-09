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
                ['name' =>  'Delta Fox',         'description' => 'Medicina',           'campus' => ''],
                ['name' =>  'Delta Horse',       'description' => 'CCO',                'campus' => ''],
                ['name' =>  'Delta Dog',         'description' => 'Artes',              'campus' => ''],
                ['name' =>  'Delta Cat',         'description' => 'Educação fisica',    'campus' => ''],

        ];


        foreach ($zones as $zone) {
            \App\Entities\Zone::create($zone);
        }

    }
}

