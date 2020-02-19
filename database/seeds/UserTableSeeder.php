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
            'id' => 1,
            'name' => 'Rafael',
            'username' => 'rafael',
            'password' => bcrypt('senha123'),
            'role' => 1
        ]);

        User::create([
            'id' => 2,
            'name' => 'Luis',
            'username' => 'luis',
            'password' => bcrypt('senha123'),
            'role' => 1
        ]);

        User::create([
            'id' => 3,
            'name' => 'Pedro',
            'username' => 'pedro',
            'password' => bcrypt('senha123'),
            'role' => 1
        ]);
    }
}
