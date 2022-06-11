{{-- @extends('layouts.title') --}}
@extends('layouts.app')
{{-- @section('prefecture', $prefecture->name) --}}
@section('content')
    <p><a href="{{ route('index') }}">都道府県選択に戻る</a></p>
    <h1 id="" class="">ガチで{{ $prefecture->name }}の人しか解けない！ #{{ $prefecture->name }}の難読地名クイズ</h1>
    {{-- @section('main') --}}
    @foreach ($prefecture->questions as $question)
        <section class="">
            <h2>{{ $loop->iteration }}.この地名はなんて読む？</h2>
            <img src="/images/{{ $question->image }}" alt="画像{{ $loop->iteration }}" class="">
            <ul>
                @foreach ($question->choices->shuffle() as $choice)
                    <li id="{{ $question->id }}choice{{ $loop->iteration }}"
                        onclick="makingTrueAnswerBox({{ $question->id }}, {{ $loop->iteration }}, {{ $choice->valid }}, 1)">
                        {{ $choice->choice }}</li>
                @endforeach
            </ul>
            {{-- 正解エリア --}}
            <div class="result_border" id="correct_area{{ $question->id }}" style="display: none;">
                <span class="true_underline">正解！</span>
                {{-- 該当質問のうち、valid = 1のデータの選択肢の名前を出力 --}}
                <p>正解は{{ $question->choices->where('valid', '=', 1)->first()->choice }}です</p>
            </div>
            {{-- 不正解エリア --}}
            <div class="result_border" id="false_area{{ $question->id }}" style="display: none;">
                <span class="false_underline">不正解。。。</span>
                <p>正解は{{ $question->choices->where('valid', '=', 1)->first()->choice }}です</p>
            </div>
        </section>
    @endforeach
@endsection
