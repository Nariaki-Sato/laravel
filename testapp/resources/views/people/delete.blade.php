@extends ('layouts.layout')

@section('title', 'User Edit')

@section('content')

    <table>
        <form action="/people/delete" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$person->id}}">
            <tr><th>id</th><td>{{$person->id}}</td></tr>
            <tr><th>name</th><td>{{$person->name}}</td></tr>
            <tr><th>sex</th><td>{{$person->sex}}</td></tr>
            <tr><th>age</th><td>{{$person->age}}</td></tr>
            <tr><th></th><td><input type="submit" value="Delete"></td></tr>
        </form>
    </table>

@endsection
