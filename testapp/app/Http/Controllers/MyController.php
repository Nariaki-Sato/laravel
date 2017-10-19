<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\MyRequest;

# /routes/web.phpから飛んでくる

class MyController extends Controller {

    # Route::get('chapter2', 'MyController@index');

    public function index(Request $request, $id='0') {
        $data = [
            'msg1' => 'This is my practice code.', # $msgとしてecho可能
            'id' => $id, # $idとしてecho可能
            'request' => $request,
            'array' => ['one', 'two', 'three', 'four', 'five'],
        ];

        # /resources/view/practice/index.blade.phpへ
        return view('practice.index', $data);
    }

    public function post(Request $request) {
        $data = [
            'name' => $request->name,
            'number' => (int)$request->number,
            'msg3' => 'こんにちは、' . $request->name . 'さん！',
            'var' => null,
        ];
        return view('practice.result', $data);
    }

    public function child() {
        $data = ['message' => 'Hello from Controller!',];
        return view('practice.child', $data);
    }


    ### Validation Test

    public function validation(Request $request) {
#    public function validation(Request $request) {
        return view('practice.validation', ['msg'=>'Fill in blanks!']);
    }

    public function post_validation(MyRequest $request) { # 渡す引数をMyRequestにするとその内容を元にValidateする

        $validate_rule = [ //検証ルールは配列でまとめる 'inputの項目名' => 'ルールの指定'
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];

        $this->validate($request, $validate_rule); # 引数にvalidate_ruleを指定

        return view('practice.validation', ['msg'=>'Success']);
    }
    
}