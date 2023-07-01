<?php

namespace Database\Factories;

use App\Models\Invoice;
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
        return [
            'content' => $this->faker->text(),
            'amount' => $this->faker->randomFloat(2, 0, 1000),
            'status' => $this->faker->randomElement([Invoice::PENDING, Invoice::GENERATED, Invoice::PAID, Invoice::UNPAID]),
            'xml' => $this->faker->imageUrl(640, 480, 'xml'),
            'pdf' => $this->faker->imageUrl(640, 480, 'pdf'),
        ];
    }
}
