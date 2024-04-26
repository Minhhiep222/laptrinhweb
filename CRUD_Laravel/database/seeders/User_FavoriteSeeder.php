<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Support\Facades\Hash;

class User_FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("user_favorites")->insert([
            [
                'user_id' => 1,
                'favorite_id' => 2,
            ],
            [
                'user_id' => 2,
                'favorite_id' => 4,
            ],
            [
                'user_id' => 1,
                'favorite_id' => 3,
            ],
            [
                'user_id' => 3,
                'favorite_id' => 1,
            ],
        ]);
    }
}
