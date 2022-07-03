@extends('layouts.app')
@section('content')
    <div class="mx-auto text-center">
        {{-- 新規登録 --}}
        <section class="">
            <h2>新規登録</h2>
            <form action="{{ route('edit_title.store') }}" method="POST">
                @csrf
                <input type="text" name="name" value="{{ old('name') }}">
                <input type="submit" value="登録">
            </form>
        </section>
        {{-- 編集 --}}
        <section class="d-inline-block w-50">
            <h2>都道府県</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prefectures as $prefecture)
                        <tr data-title="{{ $loop->index }}">
                            <form action="{{ route('edit_title.index', $prefecture->id) }}" method="POST">
                                @csrf
                                <td>
                                    {{-- <a href="edit_title/{{ $prefecture->id }}">{{ $prefecture->name }}の難読地名クイズ</a> --}}
                                    <div><span class="font-weight-bold">{{ $prefecture->name }}</span>の難読地名クイズ</div>
                                </td>
                                <td>
                                    <a href="edit_title/{{ $prefecture->id }}" class="btn btn-sm btn-primary">編集</a>
                                </td>
                            </form>
                            <td>
                                <form action="{{ route('edit_title.index', $prefecture->id) }}" method="POST">
                                    @csrf
                                    <input type="submit" class="btn btn-sm btn-danger"
                                        onClick="return confirm('設問を削除しますか？')" value="削除">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
