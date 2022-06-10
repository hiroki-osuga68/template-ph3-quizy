<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quizy｜Laravel</title>
  {{-- リセットCSS, laravel/uiダウンロードしたらいらないかも --}}
  <link href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
</head>
<body>
  <div class="">
    <p><a href="{{route('index')}}">都道府県選択に戻る</a></p>
    {{-- 共通化せずにコンテンツview毎にダイナミックに変化するものやページ毎に設定するようなものは@yield --}}
    <h1 id="" class="">ガチで@yield('prefecture')の人しか解けない！ #@yield('prefecture')の難読地名クイズ</h1>
    {{-- 子レイアウトで、問題を動的に切り替える --}}
    @yield('main')
  </div>
  <script src="{{asset('js/quizy.js')}}"></script>
</body>