<!-- app/Http/Controller/MyController.phpから飛んでくる -->
<html>
<head>
    <title>MyPractice</title>
    <style>
        body {font-size:16pt; color:#999; }
        h1 { font-size:30pt; color:#23527c; margin:0px 0px 0px 0px; }
        h2 { font-size:12pt; color:#4288CE; margin:0px 0px 0px 0px; }
        h3 { font-size:11pt; color:#31b0d5; margin: 10px 0px 0px 0px; }
        p { font-size: 10pt; margin: 0px 0px 0px 0px; }
    </style>
</head>
<body>

<h1>Index Page</h1>

<hr>

<h2>Route</h2>
<p>routes/web.php</p>
<h2>Controller</h2>
<p>app/Http/Controllers/Mycontroller.php</p>
<h2>View</h2>
<p>resources/views/practice/index.blade.php</p>

<hr>

<h3>Chapter3</h3>

    <p>$request->id: <?php echo $request->id ?></p>
    <p>Bladeで$msg1を代入: {{$msg1}}</p>

    <form method="POST" action="/practice">
        <!-- ランダムな文字列「トークン」を非表示フィールドとして追加 -->
        <!-- 「トークン」の値が正しいフォームだけ受け付ける -->
        {{ csrf_field() }}

        <p>名前を入力してください</p>
        <input type="text" name="name">
        <input type="submit">

        <p>数字を入力してください</p>
        <input type="text" name="number">
        <input type="submit">

    </form>

    <p>Example of foreach directive</p>
    <ol>
        @foreach($array as $item)
            @if($loop->first)
                <p>Arrayのitem一覧</p>
            @endif

            <li>No.{{$loop->iteration}}: {{$item}}</li>

            @if($loop->last)
                <p>Arrayのitemはここまで</p>
            @endif
        @endforeach
    </ol>

<p>Example of while, php directive</p>
<ol>
    @php
    $counter = 0;
    @endphp

    @while($counter < count($array))
        <li>{{$array[$counter]}}</li>
        @php
        $counter++;
        @endphp
    @endwhile
</ol>


<h3>Chapter2</h3>
    <p>$data['msg1']: <?php echo $msg1 ?></p>
    <p>$data['id']: <?php echo $id ?></p>

    <!-- Requestのメソッド -->
    <p>クエリを含まないURL: $request->url() <?php echo $request->url() ?></p>
    <p>クエリを含むURL: $request->fullurl() <?php echo $request->fullurl() ?></p>
    <p>ドメイン下のPath: $request->path() <?php echo $request->path() ?></p>


</body>
</html>