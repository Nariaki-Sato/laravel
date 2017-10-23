@extends ('layouts.layout')

@section('title', 'People New')


@section('content')
    @if(count($errors) > 0)
        <div>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table>
        <form action="/people/new" method="post">
            {{ csrf_field() }}
            <tr><th>name</th><td><input type="text" name="name"></td></tr>
            <tr><th>sex</th><td><input type="text" name="sex"></td></tr>
            <tr><th>age</th><td><input type="number" name="age"></td></tr>
            <tr><th></th><td><input type="submit" value="新規登録"></td></tr>
        </form>
    </table>

@endsection
