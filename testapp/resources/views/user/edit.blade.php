@extends ('layouts.layout')

@section('title', 'User Edit')

@section('content')

<table>
    <form action="/user/edit" method="post">
        {{ csrf_field() }}
        <tr><th>id</th><td>{{$user->id}}</td></tr>
        <tr><th>name</th><td><input type="text" name="name" value="{{$user->name}}"></td></tr>
        <tr><th>sex</th><td><input type="text" name="sex" value="{{$user->sex}}"></td></tr>
        <tr><th>age</th><td><input type="text" name="age" value="{{$user->age}}"></td></tr>
        <tr><th></th><td><input type="submit" value="Update"></td></tr>
    </form>
</table>

@endsection
