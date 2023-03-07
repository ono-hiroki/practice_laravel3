<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Index</title>
</head>
<body>
<h1>Index</h1>
<div>
    <p>投稿フォーム</p>
    <form action="{{route('tweet.create')}}" method="post">
        @csrf
        <label for="tweet-content">ツイート内容</label>
        <textarea id="tweet-content" type="text" name="tweet" placeholder="つぶやきを入力"></textarea>
        <button type="submit">投稿</button>
        @error('tweet')
        <p style="color: red">{{$message}}</p>
        @enderror
    </form>
</div>
</body>
</html>
