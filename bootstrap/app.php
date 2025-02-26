<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request; 

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // リクエストルートが admin.* なら admin.login に、それ以外なら user.login にリダイレクト
        $middleware->redirectGuestsTo(function (Request $request) {
          return $request->routeIs('admin.*')
              ? route('admin.login') 
              : route('user.login');
        });

        // エイリアスとして追加
        $middleware->alias([       
          'guest' => \App\Http\Middleware\CustomRedirectIfAuthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
