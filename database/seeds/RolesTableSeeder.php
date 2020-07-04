<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
//use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{

    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign created permissions
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Mahasiswa']);
        Role::create(['name' => 'Dosen']);

        //sama semua yg ini
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Kaprodi']);
        Role::create(['name' => 'Kajur']);

        $this->command->info('Berhasil Menambahkan Roles');

    }
}
