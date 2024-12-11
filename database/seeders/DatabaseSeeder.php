<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Contact;
use App\Models\Project;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Steve McDougall',
            'email' => 'juststevemcd@gmail.com',
        ]);

        $workspace = Workspace::factory()->for($user, 'owner')->create();

        $user->update([
            'workspace_id' => $workspace->id,
        ]);

        Client::factory()
            ->for($workspace)->count(5)->create()
            ->each(fn(Client $client) => Contact::factory()->for($client)->count(3)->create())
            ->each(fn(Client $client) => Project::factory()->for($client)->count(5)->create());
    }
}
