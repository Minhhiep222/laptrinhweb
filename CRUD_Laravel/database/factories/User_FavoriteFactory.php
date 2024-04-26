<?php

namespace Database\Factories;
use App\Model\user_favorite;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User_Favorite>
 */
class User_FavoriteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => $this -> faker -> NumberBetween(1,10),
            'favorite_id' => $this -> faker -> NumberBetween(1,10),
        ];
    }
}
