<html>
<head>
    <title>@yield('title')</title>
    <style>
        body {font-size:16pt; color:#999; margin: 5px; }
        h1 { font-size:50pt; text-align:right; color:#f6f6f6;
            margin:-20px 0px -30px 0px; letter-spacing:-4pt; }
        h2 { font-size: 30pt; }
        pre { font-size: 10pt; }
        ul { font-size:12pt; }
        hr { margin: 25px 100px; border-top: 1px dashed #ddd; }
        .menutitle {font-size:14pt; font-weight:bold; margin: 0px; }
        .content {margin:10px; }
        .footer { text-align:right; font-size:10pt; margin:10px;
            border-bottom:solid 1px #ccc; color:#ccc; }
    </style>

</head>

<body>
<h1>@yield('title')</h1>
@section('menubar')
    <ul>
        <p class="menutitle">メニュー in Parent</p>
        <li>@show</li>
        <li>@show</li>
    </ul>

    <hr>

    <div class="content">@yield('content')</div>
    <!--
        # childで'components.message'としてmessageを取得
        # /views/components/message.blade.php
        <div class="message">
            <p class="msg_title">{$msg_title}</p>
            <p class="msg_content">{$msg_content}</p>
        </div>
    -->

    <div class="example">@yield('example')</div>

    <div class="content2">@yield('content2')</div>

    <div class="content3">@yield('content3')</div>

    <div class="footer">@yield('footer')</div>

</body>
</html>