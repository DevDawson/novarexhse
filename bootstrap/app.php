<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Show 403 page for authorization errors instead of 500
        $exceptions->render(function (\Illuminate\Auth\Access\AuthorizationException $e, $request) {
            if (!$request->expectsJson()) {
                return response()->view('errors.403', ['exception' => $e], 403);
            }
        });
    })->create();
