<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;  # DBクラスを利用


class UserController extends Controller
{
    # Index
    public function index() {
        $users = DB::table('user')->get();  # getで全て取得
        $data = [ 'users' => $users ];
        return view('user/index', $data);
    }

    # Show
    public function show(Request $request) {
        $user = DB::table('user')->where('id', $request->id)->first();
    	$data = [ 'user' => $user, ];
    	return view('user/show', $data);
    }

    # New
    public function new(Request $request) {
        return view('user/new');
    }

    # Create
    public function create(Request $request) {
        $params = [
            'name' => $request->name,
            'sex' => $request->sex,
            'age' => $request->age,
        ];
        DB::table('user')->insert($params);
        return redirect('/user');
    }

    # Edit
    public function edit(Request $request) {
        $user = DB::table('user')->where('id', $request->id)->first();
        $data = [ 'user' => $user, ];
    	return view('user/edit', $data);
    }

    # Update
    public function update(Request $request) {
    	$params = [
    		'id' => $request->id,
    		'name' => $request->name,
    		'sex' => $request->sex,
    		'age' => $request->age,
    	];
        DB::table('user')->where('id', $request->id)->update($params);
    	return redirect('/user');
    }


    # Search
    public function search(Request $request) {

        ### ID以下のデータを表示
        /*
        $id = $request->id;
        $users = DB::table('user')->where('id', '<=', $id)->get();
        */

        ### 年齢の最小・最大以内のデータを表示
        /*
        $min = $request->min;
        $max = $request->max;
        $users = DB::table('user')->whereRaw('age >= ? and age <= ?', [$min, $max])->get();
        */

        ### 年齢を昇順に並べる
        $users = DB::table('user')
            ->orderBy('age', 'asc')     # orderByで順序を並べ替え
            ->offset(4)                 # offsetで5番目から表示させる
            ->limit(3)                  # limitで部分的にレコードを表示
            ->get();
        $data = ['users' => $users ];
        return view('user/search', $data);


    }
}
