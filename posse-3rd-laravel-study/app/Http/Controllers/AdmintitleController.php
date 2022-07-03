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

  public function store(Request $request)
  {
    $form = $request->all();
    unset($form['_token']);
    Prefecture::create($form);
    return redirect()->route('edit_title.index');
  }


  //   ------------------ここから編集の処理-------------------------------------------
  public function edit($id)
  {
    //レコードを検索
    $prefecture = Prefecture::find($id);
    //検索結果をビューに渡す
    return view('/admin/each_edit_title', compact('prefecture'));
  }

  public function update(Request $request, $id)
  {
    //レコードを検索
    $prefecture = Prefecture::find($id);
    //値を代入
    $prefecture->name = $request->name;
    //保存（更新）
    $prefecture->save();
    //リダイレクト
    return redirect()->to('/edit_title');
  }

  public function destroy($id)
  {
    //削除対象レコードを検索
    $prefecture = Prefecture::find($id);
    //削除
    $prefecture->delete();
    //リダイレクト
    return redirect()->to('/edit_title');
  }
}
