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
    @foreach($tweets as $tweet)
        <div>
            <p>{{$tweet->content}}</p>
        </div>
    @endforeach
</div>
</body>
</html>
