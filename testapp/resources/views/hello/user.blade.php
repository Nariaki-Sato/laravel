@extends('layouts.helloapp')
<style>
    .pagination { font-size:10pt; }
    .pagination li { display:inline-block }
    tr th a:link { color: white; }
    tr th a:visited { color: white; }
    tr th a:hover { color: white; }
    tr th a:active { color: white; }
</style>
@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    @if (Auth::check())
        <p>USER: {{$user->name . ' (' . $user->email . ')'}}</p>
    @else
        <p>※ログインしていません。（<a href="/login">ログイン</a>｜
            <a href="/regster">登録</a>）</p>
    @endif

    <table>
        <tr>
            <th><a href="/hello?sort=name">name</a></th>
            <th><a href="/hello?sort=sex">sex</a></th>
            <th><a href="/hello?sort=age">age</a></th>
        </tr>
        @foreach ($people as $person)
            <tr>
                <td>{{$person->name}}</td>
                <td>{{$person->sex}}</td>
                <td>{{$person->age}}</td>
            </tr>
        @endforeach
    </table>
    {{ $people->appends(['sort' => $sort])->links() }}
@endsection

@section('footer')
    copyright 2017 tuyano.
@endsection
