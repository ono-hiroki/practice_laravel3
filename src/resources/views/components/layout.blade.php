<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title ?? 'つぶやきアプリ' }}</title>
    @stack('css')
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50">
{{$slot}}
</body>
</html>
