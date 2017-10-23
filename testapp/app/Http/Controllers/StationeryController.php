<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  # DBクラスを利用

class StationeryController extends Controller
{
    public function index () {
        $items = DB::table('stationery')->get();
        $data = [ 'items' => $items ];
        return view('stationery.index', $data);
    }
}
