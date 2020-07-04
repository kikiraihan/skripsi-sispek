<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(SuperAdminSeeder::class);
        $this->call(KikiSeeder::class);
        // $this->call(MasterkriteriaSeeder::class);
        // $this->call(MahasiswaSeeder::class);
    }
}
