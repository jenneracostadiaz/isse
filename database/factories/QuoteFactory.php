<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Project;
use App\Models\Quote;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quote>
 */
class QuoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->text(),
            'amount' => $this->faker->randomFloat(2, 0, 1000),
            'status' => $this->faker->randomElement([Quote::PENDING, Quote::REVIEWING, Quote::APPROVED, Quote::IN_PROGRESS, Quote::COMPLETED]),
            'project_id' => Project::factory(),
            'company_id' => Company::factory(),
        ];
    }
}
