@extends ('layouts.layout')

@section('title', 'Stationery Index')


@section('content')
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
            </tr>
        @endforeach
    </table>


@endsection
