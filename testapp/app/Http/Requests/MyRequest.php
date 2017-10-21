<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

# FormRequestはリクエストをフォーム利用のために拡張したもの
# php artisan make:request MyRequest

class MyRequest extends FormRequest
{
    # フォームリクエストの利用が許可されているか
    public function authorize(){
        if($this->path() == 'practice/validation') { # アクセス下のパスをチェック
            return true;
        } else {
            return false;
        }
    }


    # 適用されるValidationのルールを設定する
    public function rules(){
        return [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|adult', # MyValidatorで作成したルールadultを適用
        ];
    }
            /*
             * MyServiceProviderに登録してあるので使える状態になっている
             *
             * class MyServiceProvider extends ServiceProvider{

                # ブートストラップ処理: アプリケーションが起動されるたびに割り込んで実行
                public function boot(){

                    $validator = $this->app['validator']; # ServiceProviderのappが保管場所


                    $validator->resolver( # リゾルヴ: バリデーションの処理を行うこと 引数にはクロージャを指定
                        function ($translator, $data, $rules, $messages) {
                            return new MyValidator($translator, $data, $rules, $messages); # MyValidatorメソッドを検証ルールとして追加
                        }
                    );

             *  <?php
             *
                namespace App\Http\Validators;
                    use Illuminate\Validation\Validator;

                class MyValidator extends Validator {
                    # validateAbcという命名にすれば'abc'というルールで扱われる
                    # validate名前 (属性, チェックする値, ルールのパラメータ)
                    public function validateAdult ($attribute, $value, $parameters){
                        return $value >= 18; # 入力値が18歳以上なら許可
                    }
                }
            */



    # messagesメソッドをOverrideして日本語で表示させる
    public function messages()
    {
        return [
            'name.required' => '名前は必ず入力してください',
            'mail.email' => 'メールアドレスが必要です',
            'age.numeric' => '年齢を整数で記入ください',
            'age.adult' => '[18禁]: 18歳未満の入場はお断り',   # validatorで新しく指定したルールのエラーメッセージ
//            'age.between' => '年齢は0-150間で入力ください',
        ];
    }
}
