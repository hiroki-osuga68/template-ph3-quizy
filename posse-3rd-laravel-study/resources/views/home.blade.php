@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">各メンテナンス画面を選択</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="mt-3">
                            <a href={{ route('edit_title.index') }} class='h4'>
                                1. タイトル管理へ
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
