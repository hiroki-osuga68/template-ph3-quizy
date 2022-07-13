<?php

namespace App\Http\Controllers;
// モデルの読み込み
use App\Prefecture;
use App\Question;
use Illuminate\Http\Request;
// ファサード
use Illuminate\Support\Facades\Storage;

class AdminquestionController extends Controller
{
  //
  public function index($prefecture_id)
  {
    // findはプライマリーキーの検索なため、外部キー検索はwhereを用いた
    $questions = Question::where('prefecture_id', $prefecture_id)->get();
    return view('admin/edit_question', compact('questions', 'prefecture_id'));
  }

  public function store(Request $request)
  {
    $question = new Question;
    // ↓$requestでinputタグのnameをわざわざ送らなくても、questionインスタンスからprefecture_idにアクセスできるか
    $prefecture_id = $request->prefecture_id;

    // 画像データ保存:storage/app/public
    // 画像データ読込:public/storage

    // name属性が'question'のinputタグをファイル形式に、画像をstorage/app/public/imagesに保存
    $image_path = $request->file('question')->store('public/temp');
    str_replace('public/', 'storage/', $image_path); //追加

    // 画像のファイル名をDB保存・・上記処理にて保存した画像に名前を付け、questionテーブルのimageカラムに格納
    $question->image = basename($image_path);
    $question->prefecture_id = $request->prefecture_id;

    $question->save();

    return redirect()->route('edit_question.index', ['id' => $prefecture_id]);
  }

  public function edit($id)
  {
    //レコードを検索
    $question = Question::find($id);
    return view('/admin/each_edit_question', compact('question'));
  }

  public function update(Request $request, $id)
  {
    $question = Question::find($id);
    // 画像ファイルインスタンス取得
    $image = $request->file('question');
    // 現在の画像へのパスをセット
    $image_path = $question->image;
    if (isset($image)) {
      // 現在の画像ファイルの削除
      Storage::disk('public')->delete($image_path);
      // 選択された画像ファイルを保存してパスをセット
      $image_path = $image->store('public/temp');
      // ファイル名は$temp_pathから"public/temp/"を除いたもの
      $filename = str_replace('public/temp/', '', $image_path);
      // データベースを更新
      $question->update([
        'image' => $filename,
      ]);
    }

    $prefecture_id = $question->prefecture_id;

    return redirect()->route('edit_question.index', ['id' => $prefecture_id]);
  }

  public function destroy(Request $request, $id)
  {
    //削除対象レコードを検索
    $question = Question::find($id);
    $prefecture_id = $request->prefecture_id;

    $question->delete();
    return redirect()->route('edit_question.index', ['id' => $prefecture_id]);
  }
}
