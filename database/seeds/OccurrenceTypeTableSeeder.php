<?php

use Illuminate\Database\Seeder;

class OccurrenceTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Furto',                     'description' => 'Furto é o ato de retirar algo que pertence por direito a outra pessoa, contra a vontade desta, mas sem o uso de violência contra a vítima.'],
            ['name' => 'Roubo',                     'description' => 'Crime que consiste em subtrair coisa móvel pertencente a outrem por meio de violência ou de grave ameaça.'],
            ['name' => 'Sequestro',                 'description' => 'Crime no qual uma vítima, geralmente sequestrada em seu próprio veículo, é mantida por um curto espaço de tempo.'],
            ['name' => 'Arrombamento veicular',     'description' => 'Crime que consiste em dano ao veículo para subtrair itens do mesmo.'],
            ['name' => 'Roubo de veículo',          'description' => 'Crime no qual o veículo da vítima é subtraido.'],
            ['name' => 'Tentativa de assalto',      'description' => 'Tentativa de subtrair coisa móvel pertencente a outrem por meio de violência ou grave ameaça.'],
            ['name' => 'Dano a patrimônio',         'description' => ''],
            ['name' => 'Apreensão',                 'description' => ''],
            ['name' => 'Apreenção de drogas',       'description' => ''],
            ['name' => 'Tráfico de drogas',         'description' => ''],
            ['name' => 'Furto de patrimônio',       'description' => ''],
            ['name' => 'Furto de veículo',          'description' => ''],
            ['name' => 'Furto - ZLI',               'description' => ''],
            ['name' => 'Furto - ZLE',               'description' => ''],
            ['name' => 'Roubo - ZLI',               'description' => ''],
            ['name' => 'Roubo - ZLE',               'description' => ''],
            ['name' => 'Roubo de bicicleta',        'description' => ''],
            ['name' => 'Roubo de moto',             'description' => ''],
            ['name' => 'Furto de bicicleta',        'description' => ''],
            ['name' => 'Furto de moto',             'description' => ''],
            ['name' => 'Agressão',                  'description' => ''],
            ['name' => 'Descriminação racial',      'description' => ''],
        ];

        foreach ($types as $type) {
            \App\Entities\OccurrenceType::create($type);
        }

    }
}
