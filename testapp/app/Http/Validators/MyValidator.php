<?php
namespace App\Http\Validators;
use Illuminate\Validation\Validator;

class MyValidator extends Validator {
    # validateAbcという命名にすれば'abc'というルールで扱われる
    # validate名前 (属性, チェックする値, ルールのパラメータ)
    public function validateAdult ($attribute, $value, $parameters){
        return $value >= 18; # 入力値が18歳以上なら許可
    }
}


# 組み込み先はMyServiceProvider