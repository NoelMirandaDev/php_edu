<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'review' => fake()->paragraph,
            'rating' => fake()->numberBetween(1,5),
            'created_at' => fake()->dateTimeBetween('-2 years'),
            'updated_at' => fn (array $attributes) =>
                fake()->dateTimeBetween(
                    $attributes['created_at'],
                ),
        ];
    }

    public function good()
    {
        return $this->state(
            [
                'rating' => fake()->numberBetween(4,5),
            ]
        );
    }

    public function average()
    {
        return $this->state(
            [
                'rating' => 3,
            ]
        );
    }

    public function bad()
    {
        return $this->state(
            [
                'rating' => fake()->numberBetween(1,2)
            ]
        );
    }
}
