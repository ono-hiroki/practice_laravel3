<!doctype html>
<html lang="ja">
<head>
    <title>Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<h1>つぶやきを編集する</h1>
<div>
    <a href={{route('tweet.index')}}>一覧に戻る</a>
    <p>投稿フォーム</p>
    @if(session('feedback.success'))
        <p style="color : green">{{session('feedback.success')}}</p>
    @endif
    <form action={{route('tweet.update.put', ['tweetId' => 2])}} method="post">
        @method('PUT')
        @csrf
        <label for="tweet-content">つぶやき</label>
        <span>140文字以内</span>
        <textarea name="tweet" id="tweet-content" type="text" placeholder="つぶやきを入力">{{$tweet->content}}</textarea>
        @error('tweet')
        <p style="color : red">{{$message}}</p>
        @enderror
        <button type="submit">編集</button>
    </form>
</div>
</body>
