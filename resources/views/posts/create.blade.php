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