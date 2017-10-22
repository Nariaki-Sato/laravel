<html>
<head>
    <title>@yield('title')</title>
    <style>
        table { margin: 0 auto; text-align: center; padding: 10px 0px; }
        body { color: #999; margin: 0 auto; text-align: center; }
        header, footer { background-color: rgba(150,150,150,0.1); }
        h1 { font-size: 50px; margin: 0; text-align: center; }
        li { list-style: none; padding: 10px; float: left; }
        th { background-color: #999; color: #fff; padding: 5px 10px; }
        td { border: solid 1px #aaa; color: #999; padding: 5px 10px; }
        hr { border: solid 1px #aaa; }
        footer { }

        #menu-title { float: left; padding: 20px; }
        .menu { float: right; font-size: 20px; padding: 20px; }
        .clear { clear: left; }
    </style>

</head>

<body>

    <header>
        <h1 id="menu-title">@yield('title')</h1>
        <div class="menu">
            <ul>
                <li><a href="/user">Index</a></li>
                <li><a href="/user/new">New</a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </header>

    <div class="content">@yield('content')</div>

    <footer>Copyright 2017 Sato</footer>

</body>
</html>