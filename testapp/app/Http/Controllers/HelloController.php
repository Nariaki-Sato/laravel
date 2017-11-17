<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    // index
    public function index() {
        $data = [
          'name' => ''
        ];
        return view('hello.index', $data);

    }

    // post
    public function post(Request $request) {
        $data = [
          'name' => "{$request->name}"
        ];
        return view('hello.index', $data);
    }
}

