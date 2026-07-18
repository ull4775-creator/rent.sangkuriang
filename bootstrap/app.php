<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

// FIX VERCEL: Arahkan storage ke /tmp karena filesystem Vercel read-only
if (getenv('VERCEL') === '1' || getenv('IS_VERCEL') === '1') {
    // Buat folder temporary di /tmp agar writable
    @mkdir('/tmp/storage', 0755, true);
    @mkdir('/tmp/storage/framework', 0755, true);
    @mkdir('/tmp/storage/framework/cache', 0755, true);
    @mkdir('/tmp/storage/framework/sessions', 0755, true);
    @mkdir('/tmp/storage/framework/views', 0755, true);
    @mkdir('/tmp/storage/logs', 0755, true);
}

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
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );
    })->create();