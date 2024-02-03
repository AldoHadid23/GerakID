<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            // 'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5,10))) . '</p>',
            'body' => collect($this->faker->paragraphs(mt_rand(5,10)))->map(fn($p) => "<p>$p</p>")->implode(''),
            'price' => $this->faker->randomNumber(5, true),
            'type' => $this->faker->randomElement(['Offline', 'Online', 'Hybrid']),
            'quota' => $this->faker->numberBetween(0, 100),
            'registration_start' => $this->faker->dateTime(),
            'registration_end' => $this->faker->dateTime(),
            'event_start' => $this->faker->dateTime(),
            'event_end' => $this->faker->dateTime(),
            'place' => $this->faker->streetName() . ' ' . $this->faker->buildingNumber() . ', ' . $this->faker->city(),
            'no_telp' => $this->faker->phoneNumber(),
            'user_id' => mt_rand(1,3),
            'category_id' => mt_rand(1,3)
        ];
    }
}
