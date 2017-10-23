<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller {
    public function index(Request $request) {
        $people = Person::all();
        $hasItems = Person::has('boards')->get();
        $noItems = Person::doesntHave('boards')->get();
        $data = [
            'people' => $people,
            'hasItems' => $hasItems,
            'noItems' => $noItems,
        ];
        return view('people.index', $data);
    }

    public function find(Request $request) {
        $data = [ 'input' => '' ];
        return view('people.find', $data);
    }

    public function search(Request $request) {

        # $person = Person::where('name', $request->input)->first();    # where検索
        $person = Person::nameEqual($request->input)->first();          # nameEqual検索

        $data = [
            'input' => $request->input,
            'person' => $person,
        ];

        return view('people.find', $data);
    }

    public function new(Request $request) {
        return view('people.new');
    }

    public function create(Request $request) {
        $this->validate($request, Person::$rules);      # まずValidationを通過させる
        $person = new Person;                           # 通過したらインスタンス作成
        $form = $request->all();        # allでリクエストを全て取得
        unset($form['_token']);         # フォームに非表示フィールド'_token'はあらかじめ削除
        $person->fill($form)->save();   # fillは引数に用意されている配列の値をモデルのプロパティに代入
        return redirect('/people');
    }

    public function edit(Request $request) {
        $person = Person::find($request->id);
        $data = ['person' => $person ];
        return view('people.edit', $data);
    }

    public function update(Request $request) {
        $this->validate($request, Person::$rules);      # まずValidationを通過させる
        $person = Person::find($request->id);                           # 通過したらインスタンスを探す
        $form = $request->all();        # allでリクエストを全て取得
        unset($form['_token']);         # フォームに非表示フィールド'_token'はあらかじめ削除
        $person->fill($form)->save();   # fillは引数に用意されている配列の値をモデルのプロパティに代入
        return redirect('/people');
    }

    public function delete(Request $request) {
        $person = Person::find($request->id);
        $data = ['person' => $person ];
        return view('people.delete', $data);
    }

    public function destroy(Request $request) {
        Person::find($request->id)->delete();
        return redirect('/people');
    }


}
