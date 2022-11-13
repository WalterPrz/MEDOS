<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $farmaciaRole = config('roles.models.role')::where('name', '=', 'Farmaceutico')->first();
        $medicoRole = config('roles.models.role')::where('name', '=', 'Medico')->first();
        $laboratoristaRole = config('roles.models.role')::where('name', '=', 'Laboratorista')->first();
        $adminRole = config('roles.models.role')::where('name', '=', 'Admin')->first();
        $permissions = config('roles.models.permission')::all();

        /*
         * Add Users
         *
         */
        if (config('roles.models.defaultUser')::where('email', '=', 'admin@admin.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Admin',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('password'),
            ]);

            $newUser->attachRole($adminRole);
            foreach ($permissions as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'farmaceutico@farmaceutico.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Juan Perez',
                'email'    => 'farmaceutico@farmaceutico.com',
                'password' => bcrypt('password'),
            ]);

            $newUser->attachRole($farmaciaRole);
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'medico@medico.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Luis Diaz',
                'email'    => 'medico@medico.com',
                'password' => bcrypt('password'),
            ]);

            $newUser->attachRole($medicoRole);
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'laboratorista@laboratorista.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Maria Lopez',
                'email'    => 'laboratorista@laboratorista.com',
                'password' => bcrypt('password'),
            ]);

            $newUser->attachRole($laboratoristaRole);
        }
    }
}
