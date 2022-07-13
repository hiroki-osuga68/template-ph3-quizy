@extends('layouts.app')
@section('content')
    <div class="mx-auto text-center">
        <img src="{{ asset('storage/temp/' . $image) }}" alt="" width="25%">
        {{-- 新規登録 --}}
        <section class="mb-3">
            <h2>新規登録</h2>
            {{-- 正解の登録 --}}
            <form action="{{ route("edit_choice.store", ['question_id' => $question_id]) }}" method="POST">
                @csrf
                <input type="text" placeholder="正解の選択肢" name="choice" value="{{ old('name') }}">
                <input type="hidden" name="valid" value="1">
                <input type="hidden" name="question_id" value="{{ $question_id }}">
                <input type="submit" value="登録" class="btn btn-success font-weight-bold">
            </form>
            {{-- 不正解の登録 --}}
            <form action="{{ route("edit_choice.store", ['question_id' => $question_id]) }}" method="POST" class="mt-2">
                @csrf
                <input type="text" placeholder="不正解の選択肢" name="choice" value="{{ old('name') }}">
                <input type="hidden" name="valid" value="0">
                <input type="hidden" name="question_id" value="{{ $question_id }}">
                <input type="submit" value="登録" class="btn btn-secondary text-light font-weight-bold">
            </form>
        </section>
        {{-- 編集 --}}
        <section class="d-inline-block w-50">
            <h2>設問の選択肢</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($choices as $choice)
                        <tr>
                            <td>
                                <div>
                                    <span class=
                                    "font-weight-bold
                                    @if($choice->valid == 1)
                                    text-primary
                                    @endif
                                    ">{{ $choice->choice }}</span>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('edit_choice.edit', $choice->id) }}" class="btn btn-sm btn-primary">編集</a>
                            </td>
                            <td>
                                <form action="{{ route('edit_choice.destroy', $choice->id) }}" method="POST">
                                    @csrf
                                    <input type="submit" class="btn btn-sm btn-danger"
                                        onClick="return confirm('この選択肢を削除しますか？')" value="削除">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection