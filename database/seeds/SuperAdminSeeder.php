<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user=new User;
        $user->username     ="superadmin";
        $user->email        ="";
        $user->password     =Hash::make('superadmin');
        $user->save();

        //deklarasi role
        $user->assignRole('Super Admin');

        $this->command->info('Berhasil Menambahkan Super Admin');


    }
}
