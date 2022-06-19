@extends('layouts.app')
@section('content')
    <div class="mx-auto text-center">
        <p class="h2">都道府県の選択</p>
        <div class="d-inline-block">
            @foreach ($prefectures as $prefecture)
                <a href="" class=''>
                    <p>{{ $prefecture['name'] }}の難読地名クイズ</p>
                </a>
                <div class="row">
                    <div class="col-12 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">タイトルの編集</h5>
                            <div class="card-body pb-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">社名</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>あああああああああああああ</td>
                                                <td>
                                                    <!-- エージェント更新ボタン -->
                                                    <button type="button" class="btn btn-sm btn-primary">
                                                        更新
                                                    </button>
                                                </td>
                                                <td>
                                                    <!-- エージェント削除ボタン -->
                                                    <a href="" class="btn btn-sm btn-danger"
                                                        onClick="return confirm('エージェント情報を削除しますか？')">削除</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
