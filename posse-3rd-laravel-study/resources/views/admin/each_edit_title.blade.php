@extends('layouts.app')
@section('content')
    <h1>情報編集</h1>

    <div class="row">
        <div class="col-sm-12">
            <a href="/edit_title" class="btn btn-primary" style="margin:20px;">一覧に戻る</a>
        </div>
    </div>

    <!-- form -->
    <form method="post" action="/edit_title/update/{{ $prefecture->id }}">
        @csrf
        <div class="form-group">
            <label>名前</label>
            <input type="text" name="name" value="{{ $prefecture->name }}" class="form-control">
        </div>
        <input type="submit" value="更新" class="btn btn-primary">

    </form>
@endsection
