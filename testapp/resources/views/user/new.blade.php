@extends ('layouts.layout')

@section('title', 'User New')



@section('content')
<table>
    <form action="/user/new" method="post">
        {{ csrf_field() }}
        <tr><th>name</th><td><input type="text" name="name"></td></tr>
        <tr><th>sex</th><td><input type="text" name="sex"></td></tr>
        <tr><th>age</th><td><input type="text" name="age"></td></tr>
        <tr><th></th><td><input type="submit" value="新規登録"></td></tr>
    </form>
</table>

@endsection
