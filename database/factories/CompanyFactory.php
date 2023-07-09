<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'name' => $this->faker->company(),
            'ruc' => $this->faker->unique()->numerify('###########'),
            'address' => $this->faker->address(),
            'locale' => $this->faker->city(),
            'country' => $this->faker->country(),
            'logo' => $this->faker->imageUrl(640, 480, 'cats'),
            'user_id' => User::all()->random()->id,
        ];
    }
}
