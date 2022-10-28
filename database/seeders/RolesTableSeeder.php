<?php

namespace Database\Seeders;

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
        /*
         * Role Types
         *
         */
        $RoleItems = [
            [
                'name'        => 'Admin',
                'slug'        => 'admin',
                'description' => 'Rol de administrador',
                'level'       => 0,
            ],
            [
                'name'        => 'Farmaceutico',
                'slug'        => 'farmaceutico',
                'description' => 'Rol de encargado de farmacia',
                'level'       => 0,
            ],
            [
                'name'        => 'Medico',
                'slug'        => 'medico',
                'description' => 'Rol de medico encargado',
                'level'       => 0,
            ],
            [
                'name'        => 'Laboratorista',
                'slug'        => 'laboratorista',
                'description' => 'Rol de encargado de laboratorio',
                'level'       => 0,
            ],
        ];

        /*
         * Add Role Items
         *
         */
        foreach ($RoleItems as $RoleItem) {
            $newRoleItem = config('roles.models.role')::where('slug', '=', $RoleItem['slug'])->first();
            if ($newRoleItem === null) {
                $newRoleItem = config('roles.models.role')::create([
                    'name'          => $RoleItem['name'],
                    'slug'          => $RoleItem['slug'],
                    'description'   => $RoleItem['description'],
                    'level'         => $RoleItem['level'],
                ]);
            }
        }
    }
}
