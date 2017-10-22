<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;  # DBクラスを利用


class UserController extends Controller
{
		# Index
    public function index() {
			$data = [ 'users' => DB::select('select * from user'), ];
      return view('user/index', $data);
    }

		# Show
    public function show(Request $request) {
    	$params = [ 'id' => $request->id ];
    	$users = DB::select('select * from user where id = :id', $params);
    	$data = [ 'user' => $users[0] ];
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

    # Destroy
    public function destroy(Request $request) {
    	$params = [ 'id' => $request->id ];
    	DB::delete('delete from user where id =:id', $params);
    	return redirect('/user');

    }

}
