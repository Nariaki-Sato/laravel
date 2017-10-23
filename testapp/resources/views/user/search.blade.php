@extends ('layouts.layout')

@section('title', 'User Search')

@section('content')

    @if($users != null)
        <table>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>sex</th>
                <th>age</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td><a href="/user/show?id={{ $user->id }}">{{ $user->id }}</a></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->sex }}</td>
                    <td>{{ $user->age }}</td>
                </tr>
            @endforeach
        </table>
    @endif

@endsection
