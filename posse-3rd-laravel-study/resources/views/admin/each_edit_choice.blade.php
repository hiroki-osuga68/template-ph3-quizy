@extends('layouts.app')
@section('content')
    <h1>選択肢編集</h1>

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('edit_choice.index', ['question_id' => $choice->question_id]) }}" class="btn btn-primary" style="margin:20px;">一覧に戻る</a>
        </div>
    </div>
    <!-- form -->
    <form method="post" action="{{ route("edit_choice.update", ['id' => $choice->id]) }}">
        @csrf
        <div class="form-group">
            <label>名前</label>
            <input type="text" placeholder="選択肢" name="choice" value="{{ $choice->choice }}">
        </div>
        <input type="submit" value="更新" class="btn btn-primary">
    </form>
@endsection