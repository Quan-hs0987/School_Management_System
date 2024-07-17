<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CommonMiddleware;
use App\Http\Middleware\ParentMiddleware;
use App\Http\Middleware\StudentMiddleware;
use App\Http\Middleware\TeacherMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        return [
            'admin' => AdminMiddleware::class,
            'student' => StudentMiddleware::class,
            'teacher' => TeacherMiddleware::class,
            'parent' => ParentMiddleware::class,
            'common' => CommonMiddleware::class,
        ];
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();