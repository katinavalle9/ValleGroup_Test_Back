<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \Illuminate\Database\Console\Migrations\MigrateMakeCommand::class,
        \Illuminate\Database\Console\Seeds\SeederMakeCommand::class,
        \Illuminate\Database\Console\Migrations\MigrateCommand::class,
        \Illuminate\Database\Console\Migrations\RollbackCommand::class,
        \Illuminate\Database\Console\Migrations\ResetCommand::class,
        \Illuminate\Database\Console\Migrations\RefreshCommand::class,
        \Illuminate\Database\Console\Migrations\StatusCommand::class,
        \Illuminate\Database\Console\Factories\FactoryMakeCommand::class,
        \Illuminate\Database\Console\Seeds\SeedCommand::class,
        \Illuminate\Database\Console\WipeCommand::class,
        \Illuminate\Database\Console\Migrations\InstallCommand::class,
        \Illuminate\Database\Console\Migrations\FreshCommand::class,
        \Illuminate\Database\Console\Migrations\MigrateMakeCommand::class,
        \Illuminate\Database\Console\Seeds\SeederMakeCommand::class,
        \Illuminate\Database\Console\Seeds\SeedCommand::class,
        \Illuminate\Database\Console\Factories\FactoryMakeCommand::class,
        \Illuminate\Foundation\Console\ModelMakeCommand::class,
        \Illuminate\Routing\Console\ControllerMakeCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //
    }
}
