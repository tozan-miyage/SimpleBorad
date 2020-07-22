<!--view->layoutsフォルダのlayouts.blade.phpをテンプレートとして使う-->
@extends('layouts.layouts')

<!--タイトルは、Simple Boardと表示-->
@section('title','Simple Board')

 <!--layouts.blade.phpの@yield('content')部分に挿入-->
@section('content')

<h1>Editing Post</h1>

<!--もし、入力内容にエラー（バリデーション）があったら、-->
@if ($errors->any())
    <!--アラートを表示-->
    <div class="alert alert-danger">
        <ul>
            <!--エラ〜メッセージを表示-->
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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
        <input type="text" class="form-control" aria-describedby="emailHelp"　name="title" value="{{ old('title') == '' ? $post->title : old('title') }}">
    </div>
    
    <div class="form-group">
        <lavel for="exampleInputEmail1">Content</lavel>
        <!--$post->contentでinput内容を送信-->
        <!--<input type="text" name="content" value="{{ $post->content }}">下記のtexteriaに変更-->
        <!--送信したtitleが空でも元々の内容を補完。また、編集済みの場合はそのデータをそのまま保持-->
        <textarea class="form-control" name="content">{{ old('content') == '' ? $post->content : old('content') }}"</textarea>
     </div>
        <!--送信-->
        <!--<input type="submit">下記に変更-->
        <button type="submit" class="btn btn-outline-primary">Submit</button>
</form>

<a href="/posts/{{ $post->id }}">Show</a>
<a href="/posts/">Back</a>

@endsection
