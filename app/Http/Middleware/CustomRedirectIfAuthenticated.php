<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\RedirectIfAuthenticated as BaseRedirectIfAuthenticated;

class CustomRedirectIfAuthenticated extends BaseRedirectIfAuthenticated
{

    protected function defaultRedirectUri(): string
    {
        if (request()->routeIs('admin.*')) {
            return route('admin.dashboard');
        }
        return route('user.dashboard');
    }
}
