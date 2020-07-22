<!--view->layoutsフォルダのlayouts.blade.phpをテンプレートとして使う-->
@extends('layouts.layouts')

<!--タイトルは、Simple Boardと表示-->
@section('title','Simple Board')

 <!--layouts.blade.phpの@yield('content')部分に挿入-->
@section('content')

<h1>Editing Post</h1>

<!--POSTメソッドでURL"/posts/:id"でアクセス。update()アクションを実行-->
<form method="POST" action="/posts/{{ $post->id }}">
    <!--csrf攻撃への対処-->
    {{ csrf_field() }}
    
    <!--input内容は隠すメソッドの値をPUTにしているので、アクションはshow()ではなく、update()が実行される-->
    <input type="hidden" name="_method" value="PUT">
    
    <!--form-groupクラスで囲む-->
    <div class="form-group">
        <!--テキストをチェックしても反応する-->
        <lavel for="exampleInputEmail1">Title</lavel>
        <!--$post->titleでinput内容を送信-->
        <!--form-controlクラスを追加　aria-describedby="emailHelp"は、紐づけるものがないので、いらないのではないか・・・-->
        <input type="text" class="form-control" aria-describedby="emailHelp"　name="title" value="{{ $post->title }}">
    </div>
    
    <div class="form-group">
        <lavel for="exampleInputEmail1">Content</lavel>
        <!--$post->contentでinput内容を送信-->
        <!--<input type="text" name="content" value="{{ $post->content }}">下記のtexteriaに変更-->
        <textarea class="form-control" name="content">{{ $post->content }}"</textarea>
     </div>
        <!--送信-->
        <!--<input type="submit">下記に変更-->
        <button type="submit" class="btn btn-outline-primary">Submit</button>
</form>

<a href="/posts/{{ $post->id }}">Show</a>
<a href="/posts/">Back</a>

@endsection
