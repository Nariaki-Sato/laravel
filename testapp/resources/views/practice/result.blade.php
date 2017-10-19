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

<h1>Result Page</h1>

<hr>

<h2>Route</h2>
<p>routes/web.php</p>
<h2>Controller</h2>
<p>app/Http/Controllers/Mycontroller.php</p>
<h2>View</h2>
<p>resources/views/practice/index.blade.php</p>

<hr>

<h3>Chapter3</h3>
    @if($name != '')
        <p>こんにちは、{{$name}}さん</p>
    @else
        <p>名前を入力してください</p>
    @endif

    @if($number % 3 == 1)
        <p>３で割ると１です</p>
    @elseif($number % 3 == 2)
        <p>３で割ると2です</p>
    @else
        <p>３で割り切れます</p>
    @endif

</body>
</html>