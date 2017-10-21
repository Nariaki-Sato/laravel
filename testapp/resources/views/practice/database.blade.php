<html>
<head>
    <title>Database</title>
</head>

<body>

<h1>Database Practice</h1>

<table>
    <tr><th>id</th><th>name</th><th>sex</th><th>old</th></tr>
    @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
        </tr>
    @endforeach
</table>


</body>
</html>