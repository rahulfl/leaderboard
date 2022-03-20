<?php

namespace Database\Factories;

use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $level_id = Level::all()->random()->id;
        return [
            'name' => $this->faker->name(),
            'level_id' => $level_id,
            'start_year' => $this->faker->year('now'),
            'description' => $this->faker->paragraph(),
        ];
    }
}
