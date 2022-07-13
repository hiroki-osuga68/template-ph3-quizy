<?php

namespace App\Http\Controllers;
// モデルの読み込み
use App\Question;
use App\Choice;

use Illuminate\Http\Request;

class AdminchoiceController extends Controller
{
    //
    public function index($question_id)
  {
    $choices = Choice::where('question_id', $question_id)->get();
    $image = Question::where('id', $question_id)->first()->image;
    return view('admin/edit_choice', compact('choices', 'question_id', 'image'));
  }

  public function store(Request $request, $question_id)
  {
    $form = $request->all();
    unset($form['_token']);
    Choice::create($form);
    return redirect()->route('edit_choice.index', ['question_id' => $question_id]);
  }

  public function edit($id)
  {
    $choice = Choice::find($id);
    return view('/admin/each_edit_choice', compact('choice'));
  }

  public function update(Request $request, $id)
  {
    $choice = Choice::find($id);
    //値を代入
    $choice->choice = $request->choice;
    //保存（更新）
    $choice->save();
    //リダイレクト
    return redirect()->route('edit_choice.index', ['question_id' => $choice->question_id]);
  }

  public function destroy($id)
  {
    //削除対象レコードを検索
    $choice = Choice::find($id);
    $choice->delete();
    return redirect()->route('edit_choice.index', ['question_id' => $choice->question_id]);
  }

}
