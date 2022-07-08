@extends('layouts.app')
@section('content')
    <div class="mx-auto text-center">
        <div class="">
            <p class="h2">都道府県の選択</p>
            <div class="h2 d-inline-block">
                @foreach ($prefectures as $prefecture)
                    <a href={{ route('page', ['id' => $prefecture->id]) }} class=''>
                        <p>{{ $prefecture['name'] }}の難読地名クイズ</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
