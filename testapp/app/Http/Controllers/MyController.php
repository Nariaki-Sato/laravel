<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\MyRequest; # フォームリクエストを用いたバリデーション

use Illuminate\Support\Facades\DB; # DBクラスを利用

# /routes/web.phpから飛んでくる

class MyController extends Controller {

    public function db(Request $request) {
        $items = DB::select('select * from people');
        return view('practice/db', ['items' => $items]);
    }








    public function cookie(Request $request) {
        if($request->hasCookie('msg')) {
            # 値の取得はRequestのcookieメソッドを使う
            $msg = 'Cookie: ' . $request->cookie('msg');
        } else {
            $msg = 'クッキーはありません';
        }
        return view('practice/cookie', ['msg'=>$msg]);
    }

    public function post_cookie(Request $request) {

        $validate_rule = ['msg' => 'required']; # Validation Rule
        $this->validate($request, $validate_rule); # Validationの適用

        $msg = $request->msg; # msgの値を取得

        # Responseを用意する
        $response = new Response(view('practice.cookie', ['msg'=>'「'.$msg.'」はクッキー']));
        $response->cookie('msg', $msg, 100); # cookieを呼び出して値を保存し
        return $response; # cookieを返す
    }

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

        return view('practice.validation', ['msg'=>'MyValidator']);
        /*
        ### Validatorを用いたValidation 2 クエリをチェックする

        $validator = Validator::make(
          $request->query(),            # 送信されたqueryを配列の形にまとめたものを返す
          [
              'id' => 'required',       # idが存在するかチェック
              'pass' => 'required',     # passが存在するかチェック
          ]
        );

        if($validator->fails()) {
            $msg = 'クエリーに問題があります';
        } else {
            $msg = 'ID/PASSを受け付けました';
        }

        return view('practice.validation', ['msg' => $msg, ]);
        */
    }


    public function post_validation(MyRequest $request) { # 渡す引数をMyRequestにするとその内容を元にValidateする


        /*
        ### Validatorを用いたValidation 1 フォームの値をチェックする

        $rules = [
            'name' => 'required',
            'mail' => 'email',                      # 第二引数には検証ルールの配列をまとめたもの
            'age' => 'numeric',

//            'age' => 'numeric |between:0,150',
        ];

        $messages = [
            'name.required' => '名前は必ず入力して',
            'mail.email' => 'メールアドレスが必要',
            'age.numeric' => '年齢を整数で入力して',
            'age.min' => '年齢は0歳以上',                 # sometimesのage.minで追加されている
            # 'age.between' => '年齢は0-150の間で入力して',
        ];

        $validator = Validator::make(
            $request->all(),    # 第一引数にはチェックする値をまとめた配列
            $rules,             # 第二引数にはValidation Ruleの配列
            $messages           # 第三引数にはエラーメッセージをまとめた配列
        );

        ## 条件に応じて新しくルールを追加する
        $validator->sometimes(
            'age',                                              # 第一引数 項目名
            'min:0',                                            # 第二引数 ルール
            function($input) { return !is_int($input->age); }   # 第三引数 クロージャ
            // ^ $inputが入力値をまとめた配列
            // trueなら何もしない, falseならsometimesで指定したルールを指定の項目に追加
            // is_int 変数が整数型ならtrue $input->ageの値が整数ならfalseが返され、ルールが適用される
        );

        if($validator->fails()) {
            return redirect('/practice/validation') # 入力フォームへのリダイレクト
                ->withErrors($validator) # Validatorで発生したエラーメッセージをリダイレクト先まで引き継ぐ
                ->withInput(); # 送信されたフォームの値をそのまま引き継ぐ
        }

        ### ValidateRequestというTraitを用いたValidation [Validationのカスタマイズ1]

        // use App\Http\Requests\MyRequest; # フォームリクエストを用いたバリデーション
        // メソッドの引数をRequestからMyRequestに変更する

        /*
        $validate_rule = [ //検証ルールは配列でまとめる 'inputの項目名' => 'ルールの指定'
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];

        $this->validate($request, $validate_rule); # 引数にvalidate_ruleを指定
        */
        return view('practice.validation', ['msg'=>'Success']);
    }

}