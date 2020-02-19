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
            'name' => 'Rafael',
            'username' => 'rafael',
            'password' => bcrypt('senha123'),
            'role' => 1
        ]);

        User::create([
            'name' => 'Luis',
            'username' => 'luis',
            'password' => bcrypt('senha123'),
            'role' => 1
        ]);

        User::create([
            'name' => 'Pedro',
            'username' => 'pedro',
            'password' => bcrypt('senha123'),
            'role' => 1
        ]);

        // sem votos
        User::create([
            'name' => 'Daniel',
            'username' => 'daniel',
            'password' => bcrypt('senha123'),
            'role' => 1
        ]);

        User::create([
            'name' => 'Thiago',
            'username' => 'thiago',
            'password' => bcrypt('senha123'),
            'role' => 1
        ]);

        User::create([
            'name' => 'Cisco',
            'username' => 'cisco',
            'password' => bcrypt('senha123'),
            'role' => 1
        ]);
    }
}
