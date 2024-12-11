<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Cache\CacheManager;
use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'app:test', description: 'Mostly for debugging and figuring stuff out.')]
final class TestCommand extends Command
{
    public function handle(CacheManager $cache): int
    {
        // Can we get all of the user:%s:projects keys from the database for a user, and delete them?
        return self::SUCCESS;
    }
}
