@extends ('layouts.layout')

@section('title', 'User Show')

@section('content')
	<table>
    <tr>
    	<th>id</th>
    	<th>name</th>
    	<th>sex</th>
    	<th>age</th>
    </tr>
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->sex }}</td>
        <td>{{ $user->age }}</td>
    </tr>
	</table>

    <a href="/user/edit?id={{ $user->id }}">編集</a>

@endsection
