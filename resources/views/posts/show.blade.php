<!--view->layoutsフォルダのlayouts.blade.phpをテンプレートとして使う-->
@extends('layouts.layouts')

<!--タイトルは、Simple Boardと表示-->
@section('title','Simple Board')

 <!--layouts.blade.phpの@yield('content')部分に挿入-->
@section('content')

<!--見出し-->
<h1>Show</h1>
<!--もし、sessionにmesageがあったら、componentsで入れたので削除しても良いのか確認-->
<!--@if (session('message'))-->
<!--messageを表示-->
    <!--{{ session('message') }}-->
<!--@endif-->

<!--保存されたデータのtitleを表示-->
{{ $post->title }}
<br>
<!--保存されたデータのcontentを表示-->
{{ $post->content }}
<br>
<!--Editをクリックすると、URL"/post/:id/edit"にアクセス。（edit()メソッドを実行させる）-->
<a href="/posts/{{ $post->id }}/edit">Edit</a>
<a href="/posts/">Posts</a> 

@endsection
