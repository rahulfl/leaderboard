<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $win = $this->faker->randomElement(['0', '1']);

        return [
            'date' => $this->faker->date('Y-m-d', 'now'),
            'win'  => $win,            
            'winner_player_id' => null,
            'moves' => $this->faker->numberBetween(10, 100)
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Game $game) {
            //
        })->afterCreating(function (Game $game) {
            //
        });
    }
}
