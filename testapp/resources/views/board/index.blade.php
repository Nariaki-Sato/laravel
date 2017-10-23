@extends ('layouts.layout')

@section('title', 'Board Index')

@section('menu')

    <ul>
        <li><a href="/boards">Index</a></li>
        <li><a href="/boards/new">New</a></li>
    </ul>

@endsection

@section('content')

    <table>
        <tr><th>Data</th><th>Name</th></tr>
        @foreach($boards as $board)
            <tr><td>{{ $board->getData() }}</td><td>{{ $board->person->name }}</td></tr>
        @endforeach
    </table>


@endsection
