<?php

namespace App\Providers;

use Illuminate\Support\Facades\View; # View継承

use Illuminate\Support\ServiceProvider; # ServiceProviderの継承

## MyValidatorを使えるようにする
use Illuminate\Validation\Validator; # Validatorの継承
use App\Http\Validators\MyValidator; # 作ったValidatorを指定

# サービスプロバイダ: サービスを提供するための仕組み
# 登録は /config/app.php に記述をする (139行あたり)

class MyServiceProvider extends ServiceProvider{

    # ブートストラップ処理: アプリケーションが起動されるたびに割り込んで実行
    public function boot(){

        $validator = $this->app['validator']; # ServiceProviderのappが保管場所


        $validator->resolver( # リゾルヴ: バリデーションの処理を行うこと 引数にはクロージャを指定
            function ($translator, $data, $rules, $messages) {
                return new MyValidator($translator, $data, $rules, $messages); # MyValidatorメソッドを検証ルールとして追加
            }
        );


        // ビューコンポーザを設定するためのもの
    //    View::composer( //
    //        'practice.child', // 第一引数はビューの指定
    //        'App\Http\Composers\MyComposer' //namespaceで指定したコンポーザに処理を移動した

            /*function($view) { // 第二引数: 処理を実行するクロージャ, クラス
                // Viewクラスのインスタンス$viewのメソッドwithで値を追加
                $view->with('view_message', 'Hello from ServiceProvider!!');
            }*/
    //    );
    }


    # 必要なサービスの登録を行うもの
    public function register(){}
}
