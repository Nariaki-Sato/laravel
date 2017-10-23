@extends ('layouts.layout')

@section('title', 'People Index')

@section('menu')

<ul>
    <li><a href="/people">Index</a></li>
    <li><a href="/people/new">New</a></li>
</ul>

@endsection

@section('content')
    <table>
        <tr><th>Person</th><th>Board</th></tr>
        @foreach ($hasItems as $item)
            <tr>
                <td>{{$item->getData()}}</td>
                <td>
                    <table width="100%">
                        @foreach ($item->boards as $obj)
                            <tr><td>{{$obj->getData()}}</td></tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        @endforeach
    </table>
    <div style="margin:10px;"></div>
    <table>
        <tr><th>Person</th></tr>
        @foreach ($noItems as $item)
            <tr>
                <td>{{$item->getData()}}</td>
            </tr>
        @endforeach
    </table>

    <table>
         <tr><th>Person</th><th>Board</th></tr>
        @foreach($people as $person)
        <tr>
            <td>{{ $person->getData() }}</td>
            <td>
            @if($person->boards != null)
                <table width="100%">
                @foreach($person->boards as $board)
                    <tr><td>{{ $board->getData() }}</td></tr>
                @endforeach
                </table>
                <!-- 本来はboards() となるはずだが、リレーション設定するとプロパティとして扱える-->
            @endif
            </td>
        </tr>
        @endforeach
    </table>



    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>sex</th>
            <th>age</th>
        </tr>
        @foreach($people as $person)
            <tr>
                <td>{{ $person->id }}</td>
                <td>{{ $person->name }}</td>
                <td>{{ $person->sex }}</td>
                <td>{{ $person->age }}</td>

            </tr>
        @endforeach
    </table>

    <table>
        <tr><th>Data</th></tr>
        @foreach($people as $person)
        <tr><td>{{ $person->getData() }}</td></tr>
        @endforeach
    </table>


@endsection
