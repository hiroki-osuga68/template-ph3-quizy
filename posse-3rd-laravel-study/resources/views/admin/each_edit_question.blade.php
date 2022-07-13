@extends('layouts.app')
@section('content')
    <h1>設問の編集</h1>

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('edit_question.index', ['id' => $question->prefecture_id]) }}" class="btn btn-primary" style="margin:20px;">一覧に戻る</a>
        </div>
    </div>

    <form action={{ route("edit_question.update", ['id' => $question->id]) }} method="POST" enctype='multipart/form-data'>
        @csrf
        <img src="{{ asset('storage/temp/' . $question->image) }}" alt="" width="15%">
        <label>設問</label>
        <input type="file" name="question">
        <input type="hidden" name="prefecture_id" value="{{ $question->prefecture_id }}">
        <input type="submit" value="更新" class="btn btn-primary">
    </form>
@endsection
