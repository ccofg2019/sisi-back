<?php

use Illuminate\Database\Seeder;

class OccurenceTypeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Roubo', 'description' =>'Roubo com arma branca'],
            ['name' => 'Furto', 'description' =>'Sumiu da minha bolsa meu celular na sala de aula'],
            ['name' => 'Acidente sem vitimas', 'description' =>'teve um acidente perto do bloco de medicina'],
            ['name' => 'Trafico de drogas', 'description' =>'Pessoas traficando drogas no centro de Artes!'],

        ];


        foreach ($types as $type) {
            \App\Entities\OccurrenceType::create($type);
        }

    }
}
