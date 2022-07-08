<?php

namespace App\Http\Controllers;

// モデルの読み込み
use App\Prefecture;
use Illuminate\Http\Request;

class QuizyController extends Controller
{
    public function index()
    {
        // トップビューでは、東京・広島のタイトルを表示させ、そこをクリックすると、問題に遷移できるようにする
        $prefectures = Prefecture::all();
        return view('layouts/start', compact('prefectures'));
    }

    // Laravel 青本 p65 ルーティングのidがコントローラのメソッドに引数として渡される
    public function page($id)
    {
        // withメソッド・・Eager loadingでSQL的にJoin、ドットでつなげてまとめて取得可能
        // どの都道府県なのか特定する$idをfindする
        $prefecture = Prefecture::with('questions.choices')->find($id);

        return view('quizy', compact('prefecture'));
    }
}
