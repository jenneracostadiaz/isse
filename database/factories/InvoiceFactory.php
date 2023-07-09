<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $project = Project::all()->random();
        $company = Company::all()->random();

        return [
            'content' => $this->faker->text(),
            'amount' => $this->faker->randomFloat(2, 0, 1000),
            'status' => $this->faker->randomElement([Invoice::PENDING, Invoice::GENERATED, Invoice::PAID, Invoice::UNPAID]),
            'xml' => $this->faker->imageUrl(640, 480, 'xml'),
            'pdf' => $this->faker->imageUrl(640, 480, 'pdf'),
            'project_id' => $project->id,
            'company_id' => $company->id,
        ];
    }
}
