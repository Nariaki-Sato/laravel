<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    // CSRF対策をしないアクションの配列
    protected $except = [
        'hello',
    ];
}
