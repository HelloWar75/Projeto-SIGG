<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Administrador',
            'email' => 'administrador@admin.com',
            'password' => Hash::make('admin'),
            'role' => 2
        ]);
    }
}
