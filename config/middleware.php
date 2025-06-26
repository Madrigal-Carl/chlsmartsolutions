<?php

use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;

return [

    'aliases' => [
        'guest' => RedirectIfAuthenticated::class,
        'role' => RoleMiddleware::class,
    ],

];