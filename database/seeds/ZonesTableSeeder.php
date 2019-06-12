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
                ['name' =>  'Outros',                                           'description' => '',                                            'campus' => 'Recife', 'latitude' => null,           'longitude' => null],
                ['name' =>  'Reitoria da UFPE',                                 'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.05234',   'longitude' => '-34.9451239'],
                ['name' =>  'Departamento de Energia Nuclear',                  'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0576847', 'longitude' => '-34.9553646'],
                ['name' =>  'CCEN',                                             'description' => 'Centro de Ciências Exatas e da Natureza',     'campus' => 'Recife', 'latitude' => '-8.0564252', 'longitude' => '-34.9519059'],
                ['name' =>  'CIn',                                              'description' => 'Centro de Informática',                       'campus' => 'Recife', 'latitude' => '-8.0556683', 'longitude' => '-34.951578'],
                ['name' =>  'Departamento de Oceanografia',                     'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0547888', 'longitude' => '-34.953935'],
                ['name' =>  'Editora Universitária',                            'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.055167',  'longitude' => '-34.955715'],
                ['name' =>  'NIATE',                                            'description' => 'Aulas dos cursos dos centros CCE/CTG',        'campus' => 'Recife', 'latitude' => '-8.054762',  'longitude' => '-34.952737'],
                ['name' =>  'CTG',                                              'description' => 'Centro de Tecnologia e Geociências',          'campus' => 'Recife', 'latitude' => '-8.0538119', 'longitude' => '-34.9546445'],
                ['name' =>  'Biblioteca do CTG',                                'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.053586',  'longitude' => '-34.955108'],
                ['name' =>  'Departamento de Engenharia de Produção',           'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0535397', 'longitude' => '-34.9532088'],
                ['name' =>  'Centro de Convenções',                             'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0525923', 'longitude' => '-34.950709'],
                ['name' =>  'CAC',                                              'description' => 'Centro de Artes e Comunicação',               'campus' => 'Recife', 'latitude' => '-8.051042',  'longitude' => '-34.9538411'],
                ['name' =>  'CFCH',                                             'description' => 'Centro de Filosofia e Ciências Humanas',      'campus' => 'Recife', 'latitude' => '-8.0499166', 'longitude' => '-34.9539491'],
                ['name' =>  'Restaurante Universitário',                        'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0508109', 'longitude' => '-34.9525845'],
                ['name' =>  'CE',                                               'description' => 'Centro de Educação',                          'campus' => 'Recife', 'latitude' => '-8.0492858', 'longitude' => '-34.9533476'],
                ['name' =>  'NIATE',                                            'description' => 'Aulas dos cursos dos centros CFCH/CCSA',      'campus' => 'Recife', 'latitude' => '-8.0492735', 'longitude' => '-34.95238'],
                ['name' =>  'CCSA',                                             'description' => 'Centro de Ciências Sociais Aplicadas',        'campus' => 'Recife', 'latitude' => '-8.0492028', 'longitude' => '-34.9512662'],
                ['name' =>  'Biblioteca Central',                               'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0509862', 'longitude' => '-34.9514184'],
                ['name' =>  'NTI',                                              'description' => 'Núcleo de Tecnologia da Informação',          'campus' => 'Recife', 'latitude' => '-8.0529006', 'longitude' => '-34.9493085'],
                ['name' =>  'NIATE',                                            'description' => 'Aulas dos cursos dos centros CCB/CCS',        'campus' => 'Recife', 'latitude' => '-8.0514596', 'longitude' => '-34.9488764'],
                ['name' =>  'CB',                                               'description' => 'Centro de Biociências',                       'campus' => 'Recife', 'latitude' => '-8.0504929', 'longitude' => '-34.9485981'],
                ['name' =>  'CCS',                                              'description' => 'Centro de Ciências da Saúde',                 'campus' => 'Recife', 'latitude' => '-8.0500436', 'longitude' => '-34.9464986'],
                ['name' =>  'Departamento de Nutrição',                         'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0494381', 'longitude' => '-34.9480545'],
                ['name' =>  'FIOCRUZ / LIKA',                                   'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0489563', 'longitude' => '-34.9489414'],
                ['name' =>  'Biblioteca do CCS',                                'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0487356', 'longitude' => '-34.9479301'],
                ['name' =>  'Departamento de Engenharia Química',               'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0468484', 'longitude' => '-34.9514663'],
                ['name' =>  'Núcleo de Hotelaria e Turismo',                    'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0476507', 'longitude' => '-34.9504636'],
                ['name' =>  'Departamento de Antibióticos',                     'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0477109', 'longitude' => '-34.9497501'],
                ['name' =>  'Corpo Discente',                                   'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0470729', 'longitude' => '-34.9502718'],
                ['name' =>  'Cecine',                                           'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0469019', 'longitude' => '-34.9502005'],
                ['name' =>  'Departamento de Farmácia',                         'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.047034',  'longitude' => '-34.949001'],
                ['name' =>  'Departamento de Odontologia',                      'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.047626',  'longitude' => '-34.9482192'],
                ['name' =>  'Reabilitação',                                     'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0470114', 'longitude' => '-34.9479725'],
                ['name' =>  'Hospital das Clínicas',                            'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0474221', 'longitude' => '-34.9461687'],
                ['name' =>  'Departamento de Fisioterapia',                     'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0540085', 'longitude' => '-34.9487681'],
                ['name' =>  'Núcleo de Educação Física e Desportos',            'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0549846', 'longitude' => '-34.9485923'],
                ['name' =>  'Clube Universitário',                              'description' => '',                                            'campus' => 'Recife', 'latitude' => '-8.0556932', 'longitude' => '-34.9495228'],
                ['name' =>  'Bloco de salas de aula 01',                        'description' => '',                                            'campus' => 'Vitória', 'latitude' => '-8.116309', 'longitude' => '-35.299099'], 
                ['name' =>  'Bloco de Laboratório 01',                          'description' => '',                                            'campus' => 'Vitória', 'latitude' => '-8.115997', 'longitude' => '-35.298953'],                                                            
                ['name' =>  'Bloco de salas de aula 02',                        'description' => '',                                            'campus' => 'Vitória', 'latitude' => '-8.116805', 'longitude' => '-35.298053'], 
                ['name' =>  'Bloco de Laboratório 02',                          'description' => '',                                            'campus' => 'Vitória', 'latitude' => '-8.116799', 'longitude' => '-35.298316'],   
                ['name' =>  'Bloco de salas de aula 03',                        'description' => '',                                            'campus' => 'Vitória', 'latitude' => '-8.116400', 'longitude' => '-35.298064'], 
                ['name' =>  'Cantina',                                          'description' => 'Campus Vitória',                              'campus' => 'Vitória', 'latitude' => '-8.116557', 'longitude' => '-35.298561'],  
                ['name' =>  'Quadra',                                           'description' => '',                                            'campus' => 'Vitória', 'latitude' => '-8.116240', 'longitude' => '-35.298558'],  
                ['name' =>  'Bloco Administrativo e Coordenações dos Cursos',   'description' => '',                                            'campus' => 'Vitória', 'latitude' => '-8.116512', 'longitude' => '-35.298967'],  
                ['name' =>  'Biblioteca',                                       'description' => '',                                            'campus' => 'Vitória', 'latitude' => '-8.116413', 'longitude' => '-35.298909'],   
                ['name' =>  'Bloco 01',                                         'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.225740', 'longitude' => '-35.981535'], 
                ['name' =>  'Bloco 02',                                         'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.225189', 'longitude' => '-35.982629'],  
                ['name' =>  'Bloco 03',                                         'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.225417', 'longitude' => '-35.981552'], 
                ['name' =>  'Bloco 04',                                         'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.225560', 'longitude' => '-35.981827'],               
                ['name' =>  'Bloco 05',                                         'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.225759', 'longitude' => '-35.982065'],
                ['name' =>  'Bloco 06',                                         'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.225276', 'longitude' => '-35.981857'], 
                ['name' =>  'Bloco 07',                                         'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.225425', 'longitude' => '-35.982120'], 
                ['name' =>  'Bloco 09',                                         'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.225019', 'longitude' => '-35.982305'],  
                ['name' =>  'Bloco 13',                                         'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.225906', 'longitude' => '-35.981790'],  
                ['name' =>  'Bloco 14',                                         'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.224827', 'longitude' => '-35.982639'], 
                ['name' =>  'Bloco 15',                                         'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.224654', 'longitude' => '-35.982364'], 
                ['name' =>  'Bloco 16',                                         'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.225032', 'longitude' => '-35.982903'], 
                ['name' =>  'Bloco 17',                                         'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.224639', 'longitude' => '-35.982925'],  
                ['name' =>  'Bloco 18',                                         'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.224494', 'longitude' => '-35.982679'], 
                ['name' =>  'Bloco 26',                                         'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.225790', 'longitude' => '-35.981253'],   
                ['name' =>  'Bloco Administrativo',                             'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.224855', 'longitude' => '-35.983483'],  
                ['name' =>  'Bloco Novo',                                       'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.225020', 'longitude' => '-35.982107'],  
                ['name' =>  'Cafeteria Campus do Agreste',                      'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.224888', 'longitude' => '-35.984891'],  
                ['name' =>  'Restaurante Universitário',                        'description' => '',                                            'campus' => 'Caruaru', 'latitude' => '-8.225105', 'longitude' => '-35.983955'], 
                ['name' =>  'Cantina',                                          'description' => 'Campus Caruaru',                              'campus' => 'Caruaru', 'latitude' => '-8.225399', 'longitude' => '-35.982307'],
                ['name' =>  'TV Universitária',                                 'description' => '',                                            'campus' => 'Recife',  'latitude' => '-8.0496792', 'longitude' => '-34.8746878'],
                ['name' =>  'CCJ - Centro de Ciências Jurídicas',               'description' => '',                                            'campus' => 'Recife',  'latitude' => '-8.0589123', 'longitude' => '-34.8827248'],
                ['name' =>  'Memorial da Medicina de Pernambuco',               'description' => '',                                            'campus' => 'Recife',  'latitude' => '-8.0584382', 'longitude' => '-34.9003994']
        ];


        foreach ($zones as $zone) {
            \App\Entities\Zone::create($zone);
        }

    }
}

