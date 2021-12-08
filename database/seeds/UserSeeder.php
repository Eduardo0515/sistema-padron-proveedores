<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@prueba.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$fUSO2YiqGHwheEx.JRzFCOSw109.XKat283e7idMfVifhpuIj/0PG', // prueba123
            'remember_token' => Str::random(10),
            'nombres' => 'Admin',
            'apellidos' => 'Admin',
            'area_labora' => null,
            'dependencia_id' => 1,
            'user_created' => null,
            'user_updated' => null,
            'is_admin' => 1,
            'estatus_id' => 1
        ]);
    }
}
