<!--もし、sessionにmesageがあったら、-->
@if (session('message'))
<!--messageを表示-->
    {{ session('message') }}
@endif

<!--保存されたデータのtitleを表示-->
{{ $post->title }}

<!--保存されたデータのcontentを表示-->
{{ $post->content }}

<!--Editをクリックすると、URL"/post/:id/edit"にアクセス。（edit()メソッドを実行させる）-->
<a href="/post/{{ $post->id}}/edit">Edit</a>
<a href="/posts/">Posts</a> 