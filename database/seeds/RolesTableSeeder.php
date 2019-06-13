<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Usuário Comum',         'department' => ''],
            ['name' => 'Inspetor',              'department' => 'DFCU'],
            ['name' => 'Diretor',               'department' => 'DFCU'],
            ['name' => 'Segurança',             'department' => 'DGOS'],
            ['name' => 'Inspetor',              'department' => 'DGOS'],
            ['name' => 'Inspetor Geral',        'department' => 'DGOS'],
            ['name' => 'Diretor Operacional',   'department' => 'DGOS'],
            ['name' => 'Superitendente',        'department' => 'SSI'],
            ['name' => 'Investigador',          'department' => 'DIP'],
            ['name' => 'Investigador Chefe',    'department' => 'DIP'],
        ];

        foreach ($roles as $role) {
            \App\Entities\Role::create($role);
        }
    }
}
