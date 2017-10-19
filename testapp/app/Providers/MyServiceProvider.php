<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

# サービスプロバイダ: サービスを提供するための仕組み
# 登録は /config/app.php に記述をする (139行あたり)

class MyServiceProvider extends ServiceProvider{
    # ブートストラップ処理: アプリケーションが起動されるたびに割り込んで実行
    public function boot(){
        // ビューコンポーザを設定するためのもの
        View::composer( //
            'practice.child', // 第一引数はビューの指定

            'App\Http\Composers\MyComposer'

            // ^ namespaceで指定したコンポーザに処理を移動した
            /*function($view) { // 第二引数: 処理を実行するクロージャ, クラス
                // Viewクラスのインスタンス$viewのメソッドwithで値を追加
                $view->with('view_message', 'Hello from ServiceProvider!!');
            }*/
        );
    }

    # 必要なサービスの登録を行うもの
    public function register(){}
}
