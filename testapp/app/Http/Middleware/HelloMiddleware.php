<?php

namespace App\Http\Middleware; //namespaceを指定しないと正しくクラスが利用できない

use Closure;

class HelloMiddleware {
    public function handle($request, Closure $next) {
        $response = $next($request);
        $content = $response->content();
        $pattern = '/<middleware>(.*)<\/middleware>/i';
        $replace = '<a href="http://$1">$1</a>';
        $content = preg_replace($pattern, $replace, $content);
        $response->setContent($content);
        return $response;
    }
}
