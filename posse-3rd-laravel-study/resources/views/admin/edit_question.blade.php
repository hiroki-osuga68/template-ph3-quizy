@extends('layouts.app')
@section('content')
    <div class="mx-auto text-center">
        {{-- 新規登録 --}}
        <section class="mb-3">
            <h2>新規登録</h2>
            {{-- この下の$prefectre_id必要なのか後で確認 --}}
            <form action={{ route("edit_question.store", ['id' => $prefecture_id]) }} method="POST" enctype='multipart/form-data'>
                @csrf
                <input type="file" name="question" />
                <input type="hidden" name="prefecture_id" value="{{ $prefecture_id }}">
                <input type="submit" value="登録" class="btn btn-success">
            </form>
        </section>
        {{-- 編集 --}}
        <section class="d-inline-block w-60">
            <h2>登録済みの設問</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                        <tr class="">
                            <td>
                                <div>
                                    {{-- <img src="/images/{{ $question->image }}" alt=""> --}}
                                    <img src="{{ asset('storage/temp/' . $question->image) }}" alt="" width="15%">
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('edit_question.edit', $question->id) }}" class="mt-2 p-3 btn btn-sm btn-primary">編集</a>
                            </td>
                            <td>
                                <form action={{ route('edit_question.destroy', $question->id) }} method="POST">
                                    @csrf
                                    <input type="hidden" name="prefecture_id" value="{{ $prefecture_id }}">
                                    <input type="submit" class="mt-2 p-3 btn btn-sm btn-danger"
                                        onClick="return confirm('この設問を削除しますか？')" value="削除">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
