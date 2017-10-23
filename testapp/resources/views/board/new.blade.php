@extends ('layouts.layout')

@section('title', 'Board New')

@section('menu')

    <ul>
        <li><a href="/boards">Index</a></li>
        <li><a href="/boards/new">New</a></li>
    </ul>

@endsection


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
        <form action="/boards/new" method="post">
            {{ csrf_field() }}
            <tr><th>person_id</th><td><input type="number" name="person_id"></td></tr>
            <tr><th>title</th><td><input type="text" name="title"></td></tr>
            <tr><th>message</th><td><input type="text" name="message"></td></tr>
            <tr><th></th><td><input type="submit" value="新規登録"></td></tr>
        </form>
    </table>

@endsection
