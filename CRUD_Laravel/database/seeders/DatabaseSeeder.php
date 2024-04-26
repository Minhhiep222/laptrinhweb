<?php

namespace Database\Seeders;
use App\Models\posts;
use App\Models\favorities;
use App\Models\user_favorite;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call( [
                FavoriteSeeder::class,
                PostSeeder::class,
                User_FavoriteSeeder::class,
            ]
        );
    }
}
