<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $administrativo = Role::create(['name'=>'Administrativo']);
        $docente= Role::create(['name'=>'Docente']);
        $estudiante= Role::create(['name'=>'Estudiante']);
        $admin= Role::create(['name'=>'Administrador']);

        Permission::create(['name'=>'']);

    }
}
