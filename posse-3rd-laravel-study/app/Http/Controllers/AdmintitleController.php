<?php

namespace App\Http\Controllers;
// モデルの読み込み
use App\Prefecture;
use Illuminate\Http\Request;

class AdmintitleController extends Controller
{
    public function index()
    {
        $prefectures = Prefecture::all();
        // viewの第2引数に変数を指定し、bladeで利用可能にする
        return view('admin/edit_title', compact('prefectures'));
    }
}
