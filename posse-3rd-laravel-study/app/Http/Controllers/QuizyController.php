<?php

namespace App\Http\Controllers;
// 後にFacadesの読み込み

// モデルの読み込み
use App\Prefecture;
use Illuminate\Http\Request;

class QuizyController extends Controller
{
    public function index()
    {
        // トップビューでは、東京・広島のタイトルを表示させ、そこをクリックすると、問題に遷移できるようにする
        // モデルを用いて都道府県テーブルのレコードを取得（こちらでは全ての地域を表示）
        $prefectures = Prefecture::all();
        // viewの第2引数に変数を指定し、bladeで利用可能にする
        return view('layouts/start', compact('prefectures'));
    }

    public function page($id)
    {
        // モデルを用いて都道府県テーブルのレコードを取得
        // withメソッド・・Eager loadingでSQL的にJoin、ドットでつなげてまとめて取得可能
        // select * from `questions` where `prefectures`.`id` in ($id);
        $prefecture = Prefecture::with('questions.choices')->find($id);
        // dd($prefecture->questions);
        // dd($prefecture->choices);

        // viewの第2引数に変数を指定し、bladeで利用可能にする
        return view('choice', compact('prefecture'));
    }
}
