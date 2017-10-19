<?php

namespace App\Http\Middleware; // namespaceを指定しないと正しく使えないので注意
use Closure;

// Middlewareのイメージとしてはレイヤー(層)
class MyMiddleware{
    // 第一引数でリクエスの情報を管理するRequestインスタンスを渡す
    // $nextはClosureクラスのResponseインスタンス
    public function handle($request, Closure $next){

        $response = $next($request); # コントローラのアクションが終わった後にレスポンスを生成

        $content = $response->content(); # アクションで実行された中身を取得
        $pattern = '/<middleware>(.*)<\/middleware>/i'; # i修飾子は大文字小文字の区別を無視
//        $pattern = '/(google.com)/'; # i修飾子は大文字小文字の区別を無視
//        $replace = 'AA$1A'; # middlewareタグ -> aタグ へ置き換える
        $replace = '<a href="http://$1">$1</a>'; # middlewareタグ -> aタグ へ置き換える

        #(このパターン見つけろ、これに置き換えたい、この中から探せ)
        $content = preg_replace($pattern, $replace, $content);

        $response->setContent($content); # 書き換えた$contentをsetContent()で変更・保存

        return $response;
    }
}

/*
    ### 前処理

    必要な処理をすべて実行してから$nextをreturn

    public function handle($request, Closure $next) {

        ---ミドルウェアでやりたい処理を実行する--- # コントローラーに到達する前

        return $next($request) # nextを実行してResponseインスタンスを生成、ミドルウェアが存在しなければControllerが呼び出される
    }

    ### 後処理

    必要な処理をすべ実行してから$nextをreturn

    public function handle($request, Closure $next) {

        $response = $next($request) # コントローラーでのアクションはすでに終了している

        ---ミドルウェアでやりたい処理を実行する---

        return $response # クライアントに返すだけ
    }