<?php

use Illuminate\Database\Seeder;
use App\like;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        like::create([
            'user_id' => 1,
            'vote_type' => 1
        ]);

        like::create([
            'user_id' => 2,
            'vote_type' => 2
        ]);

        like::create([
            'user_id' => 3,
            'vote_type' => 2
        ]);
    }
}
