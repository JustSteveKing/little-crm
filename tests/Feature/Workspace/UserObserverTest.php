<?php

declare(strict_types=1);

use App\Jobs\Onboarding\CreateDefaultWorkspace;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Support\Facades\Bus;

test('when a user is create a background job is dispatched', function (): void {
    Bus::fake();

    /** @var User $user */
    $user = User::factory()->create();

    Bus::assertDispatched(
        command: CreateDefaultWorkspace::class,
        callback: static fn($job): bool => $job->user === $user->id,
    );
});

test('a default workspace is created for a user', function (): void {
    expect(
        Workspace::query()->count(),
    )->toEqual(0);

    $user = User::factory()->create();

    expect(
        Workspace::query()->first(),
    )->user_id->toEqual($user->id)->name->toEqual('default');
});
