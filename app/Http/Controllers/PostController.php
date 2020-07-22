<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     //メッセージ一覧画面を表示
    public function index()
    {
        // Postテーブル全てのデータを格納
        $posts = Post::all();
        
        //view->postsフォルダのindex.blade.phpを表示。$postsを渡す
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    //  新規メッセージ作成画面を表示
    public function create()
    {
        //view->postsフォルダのcreate.blade.phpを表示
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    //  新規作成画面で入力した内容を保存
    public function store(Request $request)
    {
        // 新規レコード作成
        $post = new Post();
        //titleカラムには、inputされたtitleを格納
        $post->title = $request->input('title');
        //contentカラムには、inputされたcontentを格納
        $post->content = $request->input('content');
        //格納した情報を保存
        $post->save();
        
        // 保存したら、ルーティングに/posts/:id　URLをリダイレクト。
        return redirect()->route('posts.show',['id' => $post->id])->with('message','Post was successfully created.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
     
    // store()でリダイレクトされたものが、ここに来る
    // $store()での変数が$postに渡されている
    public function show(Post $post)
    {
        // view->postsフォルダのshow.blade.phpを表示、$postデータも渡す。
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    //  $post->idを受け取っている
    public function edit(Post $post)
    {
        // view->postsフォルダのedit.blade.phpを表示。$postデータも渡す。
        return view("posts.edit",compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    //  データを更新するメソッド
    public function update(Request $request, Post $post)
    {
        //titleカラムには、inputされたtitleを格納
        $post->title = $request->input('title');
        //contentカラムには、inputされたcontentを格納
        $post->content = $request->input('content');
        //格納した情報を保存
        $post->save();
        // 保存したら、ルーティングに/posts/:id　URLをリダイレクト。
        return redirect()->route('posts.show',['id' => $post->id])->with('message','Post was successfully update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    //  $postには、削除する$postデータが格納されている
    public function destroy(Post $post)
    {
        // 削除実行
        $post->delite();
        
        // URL"/posts"にアクセス。index()を実行
        return redirect()->route('posts.index');
    }
}
