<!--view->layoutsフォルダのlayouts.blade.phpをテンプレートとして使う-->
@extends('layouts.layouts')

<!--タイトルは、Simple Boardと表示-->
@section('title','Simple Board')

 <!--layouts.blade.phpの@yield('content')部分に挿入-->
@section('content')

<!--POSTメソッドのURL'/posts'でリクエストする-->
<form method="POST" action="/posts">
    <!--csrfトークンを設置して攻撃に対処-->
    {{ csrf_field() }}
    <!--$request->titleでinput内容を送信-->
    <input type="text" name="title">
    <!--$request->contentでinput内容を送信-->
    <input type="text" name= "content">
    <!--送信ボタン-->
    <input type="submit">
</form>

<a href="/posts/">戻る</a>

@endsection