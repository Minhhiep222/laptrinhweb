<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\favorities;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FovoriteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = favorities::class;

    public function definition(): array
    {
        return [
            //
            'name' => $this -> faker -> word,
            'description' => $this -> faker -> word,
        ];
    }
}
