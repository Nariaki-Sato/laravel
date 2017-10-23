@extends ('layouts.layout')

@section('title', 'User Edit')

@section('content')

    <table>
        <form action="/people/edit" method="post">
            {{ csrf_field() }}
            <tr><th>id</th><td><input type="text" name="id" value="{{$person->id}}"></td></tr>
            <tr><th>name</th><td><input type="text" name="name" value="{{$person->name}}"></td></tr>
            <tr><th>sex</th><td><input type="text" name="sex" value="{{$person->sex}}"></td></tr>
            <tr><th>age</th><td><input type="text" name="age" value="{{$person->age}}"></td></tr>
            <tr><th></th><td><input type="submit" value="Update"></td></tr>
        </form>
    </table>

@endsection
