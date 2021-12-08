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
        // $this->call(UsersTableSeeder::class);
        $this->call([
            TblMenusSeeder::class,
            TipoPersonaSeeder::class,
            EstatusSeeder::class,
            TblcDependenciaSeeder::class,
            UserSeeder::class,
            UserMenuSeeder::class
        ]);
    }
}
