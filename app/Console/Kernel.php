<?php

namespace App\Console;

use App\Console\Commands\ModelingDirectory;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        ModelingDirectory::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        // Define scheduled tasks
    }

    protected function commands(): void
    {
        $this->commands([
            ModelingDirectory::class,
        ]);
    }
}
