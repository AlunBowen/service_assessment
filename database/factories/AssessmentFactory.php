<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory; 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assessment>
 */
class AssessmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create(); 
        return [
            'name_en' => $faker->unique()->company(),
            'name_cym' => $faker->unique()->company(),
            'description_en' => $faker->unique()->paragraph(),
            'description_cym' => $faker->unique()->paragraph(),
        ];
    }
}
