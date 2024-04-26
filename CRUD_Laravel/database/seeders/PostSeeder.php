<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Support\Facades\Hash;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("posts")->insert([
            [
                'name' => "Tin tức",
                'user_id' => 1,
                'description' => "Mèo Rất tuyệt",
            ],
            [
                'name' => "Tin tức",
                'user_id' => 3,
                'description' => "Mèo Không Đẹp",
            ],
            [
                'name' => "Tin tức",
                'user_id' => 2,
                'description' => "Mèo Rất Đẹp",
            ],
        ]);
    }
}
