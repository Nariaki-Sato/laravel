<html>
<head>
    <title>DB</title>
</head>

<body>

<h1>DB Practice</h1>

<table>
    <tr><th>id</th><th>name</th><th>sex</th><th>old</th></tr>
    @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->sex}}</td>
            <td>{{$item->old}}</td>
        </tr>
    @endforeach
</table>

</body>
</html>