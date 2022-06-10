<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    // ホワイトリストの指定・・指定したカラムに対してのみ、 create()やupdate() 、fill()が可能になる
    protected $fillable = [
        'name',
    ];
    // ファットコントローラを防ぐために、モデルにメソッドを割り当てる

    // questionsテーブルとhasMany関係であることを定義
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
