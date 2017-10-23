<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(Request $request) {
        $boards = Board::with('person')->get();
        $data = [ 'boards' => $boards ];
        return view('board.index', $data);
    }

    public function new(Request $request) {
        return view('board.new');
    }

    public function create(Request $request){
        $this->validate($request, Board::$rules);
        $board = new Board;
        $form = $request->all();
        unset($form['_token']);
        $board->fill($form)->save();
        return redirect('/boards');
    }
 }
