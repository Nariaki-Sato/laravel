<?php

namespace App\Http\Controllers;

use App\Restdata;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use App\Http\Controllers\Validator;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
    ### authenticate
    public function user(Request $request) {
        $user = Auth::user();
        $sort = $request->sort;
        $people = Person::orderBy($sort, 'asc')->simplePaginate(5);
        $data = ['people' => $people, 'sort' => $sort, 'user' => $user];
        return view('hello.user', $data);

    }

    ### paginate
    public function paginate(Request $request)
    {
        $sort = $request->sort;
        $people = Person::orderBy($sort, 'asc')
            ->simplePaginate(5);
        $data = ['people' => $people, 'sort' => $sort];
        return view('hello.paginate', $data);
    }

    ### session ...セッションは/storage/framework/sessionsに保管される
                    #セッションに関する情報は/config/session.phpに保存
    public function session_get(Request $request) {
        $session_data = $request->session()->get('message');
        return view('hello.session', ['session_data' => $session_data]);
    }

    public function session_put(Request $request) {
        $message = $request->input;
        $request->session()->put('message', $message);
        return redirect('hello/session');
    }

    ### rest
    public function rest(Request $request)
    {
        return view('hello.rest');
    }



    public function index(Request $request)
    {
        if ($request->hasCookie('msg'))
        {
            $msg = 'Cookie: ' . $request->cookie('msg');
        } else {
            $msg = '※クッキーはありません。';
        }
        return view('hello.index', ['msg'=> $msg]);
    }

    public function post(Request $request)
    {
        $validate_rule = [
            'msg' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = new Response(view('hello.index', ['msg'=> '「' . $msg . '」をクッキーに保存しました。']));

        $response->cookie('msg', $msg, 100);

        return  $response;
    }

}

