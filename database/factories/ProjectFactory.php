<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\Project;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array

    {

        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'description' => $this->faker->text(),
            'url' => $this->faker->url(),
            'status' => $this->faker->randomElement([Project::PENDING, Project::APPROVED, Project::REJECTED, Project::INITIALIZED, Project::DONE]),
            'slug' => Str::slug($title),
            'company_id' => Company::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
