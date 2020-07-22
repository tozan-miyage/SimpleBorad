<!--view->layoutsフォルダのlayouts.blade.phpをテンプレートとして使う-->
@extends('layouts.layouts')

<!--タイトルは、Simple Boardと表示-->
@section('title','Simple Board')

 <!--layouts.blade.phpの@yield('content')部分に挿入-->
@section('content')

<!--POSTメソッドでURL"/posts/:id"でアクセス。update()アクションを実行-->
<form method="POST" action="/posts/{{ $post->id }}">
    <!--csrf攻撃への対処-->
    {{ csrf_field() }}
    
    <!--input内容は隠すメソッドの値をPUTにしているので、アクションはshow()ではなく、update()が実行される-->
    <input type="hidden" name="_method" value="PUT">
    
    <!--$post->titleでinput内容を送信-->
    <input type="text" name="title" value="{{ $post->title }}">
    
    <!--$post->contentでinput内容を送信-->
    <input type="text" name="content" value="{{ $post->content }}">
    
    <!--送信-->
    <input type="submit">
</form>

<a href="/posts/">戻る</a>

@endsection
