<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;

return Application::configure(basePath: dirname(__DIR__))

    // Define your routing
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    // Register middleware
    ->withMiddleware(function (Middleware $middleware) {
        //
    })

    // Handle exceptions
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })

    // Register scheduled tasks
    ->withSchedule(function (Schedule $schedule) {
        $schedule->command('app:send-event-reminder')->daily();
    })

    ->create();
