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

// CCSA - Centro de Ciências Sociais Aplicadas - -8.0492028,-34.9512662 (OK)
// Biblioteca Central - -8.0509862,-34.9514184 (OK)
// NTI - Núcleo de Tecnologia da Informação - -8.0529006,-34.9493085 (OK)
// NIATE - Aulas dos cursos dos centros CCB/CCS - -8.0514596,-34.9488764 (OK)
// CB - Centro de Biociências - -8.0504929,-34.9485981 (OK)
// CCS - Centro de Ciências da Saúde - -8.0500436,-34.9464986 (OK)
// Departamento de Nutrição - -8.0494381,-34.9480545 (OK)
// FIOCRUZ / LIKA - -8.0489563,-34.9489414 (OK)
// Biblioteca do CCS - -8.0487356,-34.9479301 (OK)
// Departamento de Engenharia Química - -8.0468484,-34.9514663 (OK)
// Núcleo de Hotelaria e Turismo - -8.0476507,-34.9504636 (OK)
// Departamento de Antibióticos - -8.0477109,-34.9497501 (OK)
// Corpo Discente - -8.0470729,-34.9502718 (OK)
// Cecine - -8.0469019,-34.9502005 (OK)
// Departamento de Farmácia - -8.047034,-34.949001 (OK)
// Departamento de Odontologia - -8.047626,-34.9482192 (OK)
// Reabilitação - -8.0470114,-34.9479725 (OK)
// Hospital das Clínicas - -8.0474221,-34.9461687 (OK)
// Departamento de Fisioterapia - -8.0540085,-34.9487681 (OK)
// Núcleo de Educação Física e Desportos - -8.0549846,-34.9485923 (OK)
// Clube Universitário - -8.0556932,-34.9495228 (OK)
      $zones = [
                ['name' =>  'Reitoria da UFPE',                         'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.05234',   'longitude' => '-34.9451239'],
                ['name' =>  'Departamento de Energia Nuclear',          'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0576847', 'longitude' => '-34.9553646'],
                ['name' =>  'CCEN',                                     'description' => 'Centro de Ciências Exatas e da Natureza',     'campus' => 'Recife', 'latitude' => '-8.0564252', 'longitude' => '-34.9519059'],
                ['name' =>  'CIn',                                      'description' => 'Centro de Informática',                       'campus' => 'Recife', 'latitude' => '-8.0556683', 'longitude' => '-34.951578'],
                ['name' =>  'Departamento de Oceanografia',             'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0547888', 'longitude' => '-34.953935'],
                ['name' =>  'Editora Universitária',                    'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.055167',  'longitude' => '-34.955715'],
                ['name' =>  'NIATE',                                    'description' => 'Aulas dos cursos dos centros CCE/CTG',        'campus' => 'Recife', 'latitude' => '-8.054762',  'longitude' => '-34.952737'],
                ['name' =>  'CTG',                                      'description' => 'Centro de Tecnologia e Geociências',          'campus' => 'Recife', 'latitude' => '-8.0538119', 'longitude' => '-34.9546445'],
                ['name' =>  'Biblioteca do CTG',                        'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.053586',  'longitude' => '-34.955108'],
                ['name' =>  'Departamento de Engenharia de Produção',   'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0535397', 'longitude' => '-34.9532088'],
                ['name' =>  'Centro de Convenções',                     'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0525923', 'longitude' => '-34.950709'],
                ['name' =>  'CAC',                                      'description' => 'Centro de Artes e Comunicação',               'campus' => 'Recife', 'latitude' => '-8.051042',  'longitude' => '-34.9538411'],
                ['name' =>  'CFCH',                                     'description' => 'Centro de Filosofia e Ciências Humanas',      'campus' => 'Recife', 'latitude' => '-8.0499166', 'longitude' => '-34.9539491'],
                ['name' =>  'Restaurante Universitário',                'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0508109', 'longitude' => '-34.9525845'],
                ['name' =>  'CE',                                       'description' => 'Centro de Educação',                          'campus' => 'Recife', 'latitude' => '-8.0492858', 'longitude' => '-34.9533476'],
                ['name' =>  'NIATE',                                    'description' => 'Aulas dos cursos dos centros CFCH/CCSA',      'campus' => 'Recife', 'latitude' => '-8.0492735', 'longitude' => '-34.95238'],
                ['name' =>  'CCSA',                                     'description' => 'Centro de Ciências Sociais Aplicadas',        'campus' => 'Recife', 'latitude' => '-8.0492028', 'longitude' => '-34.9512662'],
                ['name' =>  'Biblioteca Central',                       'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0509862', 'longitude' => '-34.9514184'],
                ['name' =>  'NTI',                                      'description' => 'Núcleo de Tecnologia da Informação',          'campus' => 'Recife', 'latitude' => '-8.0529006', 'longitude' => '-34.9493085'],
                ['name' =>  'NIATE',                                    'description' => 'Aulas dos cursos dos centros CCB/CCS',        'campus' => 'Recife', 'latitude' => '-8.0514596', 'longitude' => '-34.9488764'],
                ['name' =>  'CB',                                       'description' => 'Centro de Biociências',                       'campus' => 'Recife', 'latitude' => '-8.0504929', 'longitude' => '-34.9485981'],
                ['name' =>  'CCS',                                      'description' => 'Centro de Ciências da Saúde',                 'campus' => 'Recife', 'latitude' => '-8.0500436', 'longitude' => '-34.9464986'],
                ['name' =>  'Departamento de Nutrição',                 'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0494381', 'longitude' => '-34.9480545'],
                ['name' =>  'FIOCRUZ / LIKA',                           'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0489563', 'longitude' => '-34.9489414'],
                ['name' =>  'Biblioteca do CCS',                        'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0487356', 'longitude' => '-34.9479301'],
                ['name' =>  'Departamento de Engenharia Química',       'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0468484', 'longitude' => '-34.9514663'],
                ['name' =>  'Núcleo de Hotelaria e Turismo',            'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0476507', 'longitude' => '-34.9504636'],
                ['name' =>  'Departamento de Antibióticos',             'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0477109', 'longitude' => '-34.9497501'],
                ['name' =>  'Corpo Discente',                           'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0470729', 'longitude' => '-34.9502718'],
                ['name' =>  'Cecine',                                   'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0469019', 'longitude' => '-34.9502005'],
                ['name' =>  'Departamento de Farmácia',                 'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.047034',  'longitude' => '-34.949001'],
                ['name' =>  'Departamento de Odontologia',              'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.047626',  'longitude' => '-34.9482192'],
                ['name' =>  'Reabilitação',                             'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0470114', 'longitude' => '-34.9479725'],
                ['name' =>  'Hospital das Clínicas',                    'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0474221', 'longitude' => '-34.9461687'],
                ['name' =>  'Departamento de Fisioterapia',             'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0540085', 'longitude' => '-34.9487681'],
                ['name' =>  'Núcleo de Educação Física e Desportos',    'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0549846', 'longitude' => '-34.9485923'],
                ['name' =>  'Clube Universitário',                      'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0556932', 'longitude' => '-34.9495228']
        ];


        foreach ($zones as $zone) {
            \App\Entities\Zone::create($zone);
        }

    }
}

