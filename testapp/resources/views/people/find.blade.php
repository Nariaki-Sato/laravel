@extends ('layouts.layout')

@section('title', 'People Find')


@section('content')
    <p>Input Name you wanna find: (with nameEqual)</p>

    <form action="/people/find" method="post">
        {{ csrf_field() }}
        <input type="text" name="input" value="{{ $input }}">
        <input type="submit" value="Find">
    </form>

    @if(isset($person))
    <table>
        <tr><th>Data</th></tr>
        <tr><td>{{ $person->getData() }}</td></tr>
    </table>
    @endif


@endsection