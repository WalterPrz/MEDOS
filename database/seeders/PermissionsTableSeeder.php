<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Permission Types
         *
         */
        $Permissionitems = [
            /*[
                'name'        => 'Ver usuarios',
                'slug'        => 'ver.usuarios',
                'description' => 'Se pueden ver los usuarios',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Crear usuarios',
                'slug'        => 'crear.usuarios',
                'description' => 'Se pueden crear nuevos usuarios',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Editar usuarios',
                'slug'        => 'editar.usuarios',
                'description' => 'Se pueden editar usuarios',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Eliminar usuarios',
                'slug'        => 'eliminar.usuarios',
                'description' => 'Se pueden eliminar usuarios',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Listar usuarios',
                'slug'        => 'listar.usuarios',
                'description' => 'Se pueden listar usuarios',
                'model'       => 'Permission',
            ],*/
        ];

        /*
         * Add Permission Items
         *
         */
        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = config('roles.models.permission')::where('slug', '=', $Permissionitem['slug'])->first();
            if ($newPermissionitem === null) {
                $newPermissionitem = config('roles.models.permission')::create([
                    'name'          => $Permissionitem['name'],
                    'slug'          => $Permissionitem['slug'],
                    'description'   => $Permissionitem['description'],
                    'model'         => $Permissionitem['model'],
                ]);
            }
        }
    }
}
