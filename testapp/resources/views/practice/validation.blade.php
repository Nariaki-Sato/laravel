<html>
<head>
    <title>Validation</title>
</head>
<body>
    <table>
        <form action="validation" method="POST">
            {{csrf_field()}}

            <p>{{$msg}}</p>

            @if(count($errors) > 0) <!-- $errors: Validationで発生したError Messageをまとめて処理できる -->
                <p>入力に問題があります</p>
            @endif

            <!-- 名前 -->
            @if($errors->has('name'))
                <tr><th>ERROR</th><td>{{$errors->first('name')}}</td></tr> <!-- firstメソッドは最初の1つ-->
            @endif
            <tr> <th>name: </th> <td><input type="text" name="name"></td> </tr>

            <!-- メールアドレス -->
            @if($errors->has('mail'))
                <tr><th>ERROR</th><td>{{$errors->first('mail')}}</td></tr>
            @endif
            <tr> <th>mail: </th> <td><input type="text" name="mail"></td> </tr>

            <!-- 年齢-->
            @if($errors->has('age'))
                <tr><th>ERROR</th><td>{{$errors->first('age')}}</td></tr>
            @endif
            <tr> <th>age: </th> <td><input type="text" name="age"></td> </tr>

            <tr><th></th><td><input type="submit"></td></tr><p></p>
        </form>
    </table>


</body>
</html>

