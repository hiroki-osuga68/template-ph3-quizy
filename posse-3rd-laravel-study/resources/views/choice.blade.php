@extends('layouts.title')

{{-- @section('セクション名', 渡すデータ) --}}
@section('prefecture', $prefecture->name)
@section('main')
    @foreach ($prefecture->questions as $question)
        <section class="">
            <h2>{{ $loop->iteration }}.この地名はなんて読む？</h2>
            <img src="/images/{{ $question->image }}" alt="画像{{ $loop->iteration }}" class="">
            <ul>
                @foreach ($question->choices->shuffle() as $choice)
                    {{-- 素のphpで記述した時はidに正誤判定valid(0,1,2)をもたせていたが、選択肢３つにおいて(0,1)判定したいのでdata属性にvalid保持 --}}
                    <li id="{{ $question->id }}choice{{ $loop->iteration }}" onclick="makingTrueAnswerBox({{ $question->id }}, {{ $loop->iteration }}, {{ $choice->valid }}, 1)">{{ $choice->choice }}</li>
                @endforeach
            </ul>
            {{-- 正解エリア --}}
            <div class="result_border" id="correct_area{{ $loop->iteration }}" style="display: none;">
                <span class="true_underline">正解！</span>
                {{-- 該当質問のうち、valid = 1のデータの選択肢の名前を出力 --}}
                <p>正解は{{ $question->choices->where('valid', '=', 1)->first()->choice }}です</p>
            </div>
            {{-- 不正解エリア --}}
            <div class="result_border" id="false_area{{ $loop->iteration }}" style="display: none;">
                <span class="false_underline">不正解。。。</span>
                <p>正解は{{ $question->choices->where('valid', '=', 1)->first()->choice }}です</p>
            </div>
        </section>
    @endforeach
@endsection
