<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;  # DBクラスを利用


class UserController extends Controller
{
    # Index
    public function index() {
        $users = DB::table('user')->get();
        $data = [ 'users' => $users ];
        return view('user/index', $data);
    }

    # Show
    public function show(Request $request) {
    	$id = $request->id;
        $user = DB::table('user')->where('id', $id)->first();
    	$data = [ 'user' => $user ];
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
        DB::insert('insert into user (name, sex, age) values (:name, :sex, :age)', $params);
        return redirect('/user');
    }

    # Edit
    public function edit(Request $request) {
    	$params = [ 'id' => $request->id ];
    	$users = DB::select('select * from user where id = :id', $params);
    	$data = [ 'user' => $users[0] ];
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
    	DB::update('update user set name =:name, sex =:sex, age =:age where id =:id', $params);
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
        $users = DB::table('user')->orderBy('age', 'asc')->get();
        $data = ['users' => $users ];
        return view('user/search', $data);
    }
}
