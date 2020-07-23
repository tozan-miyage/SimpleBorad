<html>
    <head>
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--スマートフォン対応-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--bootstrap4のフォルダを指定して読み込み-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <!--componentsフォルダのheader.blade.phpを挿入する-->
        @component('components.header')
        @endcomponent
        <!--pt-5(padding-top: 3rem) pb-5でヘッダー固定部分のズレを修正-->
        <div class="container pt-5 pb-5">
            <!--componentsフォルダのflash.blade.phpを挿入する-->
            @component('components.flash')
            @endcomponent
            <!--componentsのcontentを使用する。-->
            @yield('content')
        </div>
        @component('components.footer')
        @endcomponent
        <!--bootstrap4で使用するJavaScriptを指定して読み込み-->
         <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html> 