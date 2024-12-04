<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Projects\Status;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Project> */
final class ProjectFactory extends Factory
{
    /** @var class-string<Project> */
    protected $model = Project::class;

    /** @return array<string,mixed> */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(
                array: Status::cases(),
            ),
            'details' => $this->faker->realText(),
            'client_id' => Client::factory(),
            'contact_id' => Contact::factory(),
        ];
    }
}
