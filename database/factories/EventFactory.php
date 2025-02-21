<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'lieu' => $this->faker->address(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'date_heure' => $this->faker->dateTimeBetween('now', '+1 year'),
            'categorie' => $this->faker->randomElement(['sport', 'musique', 'éducation']),
            'user_id' => User::factory(),
            'max_participants' => $this->faker->numberBetween(10, 100),
        ];
    }
}
