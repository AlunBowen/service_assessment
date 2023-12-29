<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory; // Add this line to import the Faker\Factory class
 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organisation>
 */
class OrganisationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create(); // Add this line to create the $faker variable

        return [
            'name' => $faker->unique()->company(),
            'description' => $faker->unique()->paragraph(),
        ];
    }
}
          
