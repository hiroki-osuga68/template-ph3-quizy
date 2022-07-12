@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <p class="h3 mb-3"><a href="{{ route('index') }}">都道府県選択に戻る</a></p>
        <h1 id="" class="h4 mb-3">ガチで{{ $prefecture->name }}の人しか解けない！ #{{ $prefecture->name }}の難読地名クイズ</h1>
        @foreach ($prefecture->questions as $question)
            <section class="">
                <h4 class="outline d-inline">{{ $loop->iteration }}.この地名はなんて読む？</h4>
                {{-- <img src="/images/{{ $question->image }}" alt="画像{{ $loop->iteration }}" class=""> --}}
                <img src="{{ asset('storage/temp/' . $question->image) }}" alt="画像{{ $loop->iteration }}">
                <ul class="lists-arrange">
                    {{-- 参考：https://readouble.com/laravel/6.x/ja/collections.html --}}
                    {{-- shuffleメソッド・・コレクションのアイテムをランダムにシャッフル。 --}}
                    @foreach ($question->choices->shuffle() as $choice)
                        <li id="{{ $question->id }}choice{{ $loop->iteration }}"
                            class="question{{ $question->id }} choices-arrange"
                            onclick="makingTrueAnswerBox({{ $question->id }}, {{ $loop->iteration }}, {{ $choice->valid }}, 1)">
                            {{ $choice->choice }}</li>
                    @endforeach
                </ul>
                {{-- 正解エリア --}}
                <div class="result_border" id="correct_area{{ $question->id }}" style="display: none;">
                    <span class="true_underline">正解！</span>
                    {{-- 該当質問のうち、valid = 1（正解）のデータの選択肢の名前を出力 --}}
                    <p>正解は{{ $question->choices->where('valid', '=', 1)->first()->choice }}です</p>
                </div>
                {{-- 不正解エリア --}}
                <div class="result_border" id="false_area{{ $question->id }}" style="display: none;">
                    <span class="false_underline">不正解。。。</span>
                    <p>正解は{{ $question->choices->where('valid', '=', 1)->first()->choice }}です</p>
                </div>
            </section>
        @endforeach
    </div>
@endsection
