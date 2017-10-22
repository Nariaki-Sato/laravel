
@extends('layouts.layout') <!-- 継承元のView -->

@section('title', 'Database')
@section('content')

<p>User一覧</p>
<table>
    <tr><th>id</th><th>name</th><th>sex</th><th>age</th></tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->sex }}</td>
        <td>{{ $user->age }}</td>
    </tr>
    @endforeach
</table>


<a href="/practice/new">新規登録</a>

@endsection

@section
    <ul>
        <li><a href="/practice/index"></a></li>
    </ul>
@endsection

@section('footer')
    Copyright 2017 Sato
@endsection

