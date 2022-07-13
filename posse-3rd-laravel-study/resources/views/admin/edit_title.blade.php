@extends('layouts.app')
@section('content')
    <div class="mx-auto text-center">
        {{-- 新規登録 --}}
        <section class="mb-3">
            <h2>新規登録</h2>
            <form action="{{ route('edit_title.store') }}" method="POST">
                @csrf
                <input type="text" name="name" value="{{ old('name') }}">
                <input type="submit" value="登録" class="btn btn-success">
            </form>
        </section>
        {{-- 編集 --}}
        <section class="d-inline-block w-50">
            <h2>登録済みの都道府県</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody id="prefectureItems">
                    @foreach ($prefectures as $prefecture)
                        <tr data-id="{{ $prefecture->id }}">
                            <td>
                                <div>
                                    <a href="edit_question/{{ $prefecture->id }}"><span class="font-weight-bold">{{ $prefecture->name }}</span>の難読地名クイズ</a>
                                </div>
                            </td>
                            <td>
                                <a href="edit_title/edit/{{ $prefecture->id }}" class="btn btn-sm btn-primary">編集</a>
                            </td>
                            <td>
                                <form action="{{ route('edit_title.destroy', $prefecture->id) }}" method="POST">
                                    @csrf
                                    <input type="submit" class="btn btn-sm btn-danger"
                                        onClick="return confirm('この都道府県を削除しますか？')" value="削除">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection

{{-- 特定のjsの読み込み --}}
@push('scripts')
    {{-- タイトル編集js --}}
    <script src="{{ asset('js/edit_title.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
@endpush
