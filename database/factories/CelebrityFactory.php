<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Celebrity>
 */
class CelebrityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    
    public function definition(): array
    {
        $faker = Faker::create();
        return [
            "name" => $faker->name($gender = 'male'|'female'),
            "age" => $faker->numberBetween(1, 100),
            "job" => $faker->jobTitle,
            "alive" => $faker->boolean(),
            "activeFrom" => $faker->date()
        ];
    }
}
