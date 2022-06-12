@extends('layouts.app')
@section('content')
    <div class="mx-auto text-center">
        <div class="">
            <p class="h2">都道府県の選択</p>
            <div class="h2 d-inline-block">
                {{-- 1. トップビューを表示させるController indexメソッドでModelから抽出した値を代入した変数$prefectures --}}
                {{-- 2. トップビューに渡す --}}
                {{-- 3. 新なルーティングname('page')に$prefecturesの各idを渡す --}}
                {{-- 4. 問題ページを表示させるController pageメソッドで引数とする --}}
                {{-- 5. 問題ページに渡す --}}
                @foreach ($prefectures as $prefecture)
                    <a href={{ route('page', ['id' => $prefecture->id]) }} class=''>
                        <p>{{ $prefecture['name'] }}の難読地名クイズ</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
