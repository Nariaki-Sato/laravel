<html>
<head>
    <title>Hello</title>
</head>
<body>
    <h1>Index</h1>
    <p>This is a sample page with php-template. </p>
    @if ($name != '')
        <p>こんにちは{{ $name }}さん！</p>
    @else
        <p>名前を入力してください</p>
    @endif
    <form action="/hello" method="POST">
        {{ csrf_field() }}
        <input type="text" name="name">
        <input type="submit">
    </form>
</body>
</html>