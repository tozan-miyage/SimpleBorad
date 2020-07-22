<!--view->layoutsフォルダのlayouts.blade.phpをテンプレートとして使う-->
@extends('layouts.layouts')

<!--タイトルは、Simple Boardと表示-->
@section('title','Simple Board')

 <!--layouts.blade.phpの@yield('content')部分に挿入-->
@section('content')

<!--フラッシュメッセージを表示-->
    @if (session('message'))
        {{ session('message') }}
    @endif
    
<!--見出し-->
<h1>Posts</h1>

<!--$postsで受け取った全データ展開-->
@foreach($posts as $post)
<!--$post->titleをクリックすると、URLで"/post/:id"にアクセス。（show()メソッドを実行させる）-->
    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
    
<!--Editをクリックすると、URL"/post/:id/edit"にアクセス。（edit()メソッドを実行させる）-->
    <a href="/posts/{{ $post->id}}/edit">Edit</a>
    
    <!--POSTメソッドで、"/posts/:id/"にアクセス。再度確認も表示-->
    <form action="/posts/{{ $post->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else { return false };">
        <!--$requestの値がDELETEなので、destroy()アクションを実行-->
        <input type="hidden" name="_method" value="DELETE">
        <!--csrf_tokenで攻撃回避-->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!--送信-->
        <button type="submit">Delete</button>
    </form>
@endforeach

<!--New Post をクリックすると、URL"/post/create"アクセス。（create()メソッドを実行させる-->
<a href="/posts/create">New Post</a>

<!--@yield('content')に挿入する部分の終了-->
@endsection