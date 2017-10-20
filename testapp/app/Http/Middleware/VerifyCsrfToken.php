<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    // CSRF対策をしないアクションの配列
    protected $except = [
        'hello',
        # 'hello/* とすれば*(ワイルドカード)が適用されて/hello下に用意された全てのページでCSRF対策が行われない
    ];
}
