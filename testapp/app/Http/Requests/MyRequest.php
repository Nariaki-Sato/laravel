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
            'age' => 'numeric|between:0,150',
        ];
    }

    # messagesメソッドをOverrideして日本語で表示させる
    public function messages()
    {
        return [
            'name.required' => '名前は必ず入力してください',
            'mail.email' => 'メールアドレスが必要です',
            'age.numeric' => '年齢を整数で記入ください',
            'age.between' => '年齢は0-150間で入力ください',
        ];
    }
}
