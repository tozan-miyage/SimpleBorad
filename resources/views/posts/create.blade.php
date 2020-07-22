<!--view->layoutsフォルダのlayouts.blade.phpをテンプレートとして使う-->
@extends('layouts.layouts')

<!--タイトルは、Simple Boardと表示-->
@section('title','Simple Board')

 <!--layouts.blade.phpの@yield('content')部分に挿入-->
@section('content')

<h1>New Post</h1>

<!--POSTメソッドのURL'/posts'でリクエストする-->
<form method="POST" action="/posts">
    <!--csrfトークンを設置して攻撃に対処-->
    {{ csrf_field() }}
    
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <!--$request->titleで受け取れるinput内容-->
        <!--<input type="text" name="title">下記に変更-->
        <input type="text" class="form-control" aria-describedby="emailHelp" name="title">
    </div>
    
    <div class="form-group">
        <label for="exampleInputPassword1">Content</label>
        <!--$request->contentで受け取れるinput内容-->
        <!--<input type="text" name= "content">下記に変更-->
        <textarea class="form-control" name="content"></textarea>
    </div>
    <!--送信ボタン-->
    <!--<input type="submit">下記に変更-->
    <button type="submit" class="btn btn-outline-primary">Submit</button>
</form>

<!--index()画面に推移-->
<a href="/posts/">Back</a>

@endsection