<html>
    <head>
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--bootstrap4のフォルダを指定して読み込み-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <!--bootstrap4で使用するJavaScriptを指定して読み込み-->
         <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html> 