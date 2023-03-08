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
@auth
<div>
    <p>投稿フォーム</p>
    @if(session('feedback.success'))
        <p style="color: green">{{session('feedback.success')}}</p>
    @endif
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
@endauth
@foreach($tweets as $tweet)
    <details>
        <summary>{{$tweet->content}} by {{$tweet->user->name }} </summary>
        @if(\Illuminate\Support\Facades\Auth::id() === $tweet->user_id)
        <div>
            <a href="{{route('tweet.update.index', ['tweetId' => $tweet->id])}}">編集</a>
            <form action="{{route('tweet.delete', ['tweetId' => $tweet->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>
        </div>
        @else
            <p>投稿者以外は編集・削除できません</p>
        @endif
    </details>
@endforeach
</body>
</html>
