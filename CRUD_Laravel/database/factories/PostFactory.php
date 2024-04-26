<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\posts;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = posts::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'user_id' => $this->faker->numberBetween(1,3),
            'description' => $this->faker->word,
        ];
    }
}
