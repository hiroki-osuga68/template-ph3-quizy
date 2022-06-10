@extends('layouts.app')
{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quizy｜Laravel</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head> --}}

{{-- <body> --}}
    @section('content')
    <div class="flex-center position-ref full-height">
        {{-- @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif --}}

        <div class="content">
            <p>都道府県の選択</p>
            <div class="title m-b-md">
                {{-- {{ $id }}.{{ $title }}の難読地名クイズ --}}
                @foreach ($prefectures as $prefecture)
                    <a href={{route('page', ['id' => $prefecture->id])}} class='d-blok'>
                        <p>{{ $prefecture['name'] }}の難読地名クイズ</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
{{-- </body> --}}

{{-- </html> --}}
