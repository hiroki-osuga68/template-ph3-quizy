@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                {{-- <div class="content">
                    <p>都道府県の選択</p>
                    <div class="title m-b-md">
                        @foreach ($prefectures as $prefecture)
                            <a href={{route('page', ['id' => $prefecture->id])}} class='d-blok'>
                                <p>{{ $prefecture['name'] }}の難読地名クイズ</p>
                            </a>
                        @endforeach
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
