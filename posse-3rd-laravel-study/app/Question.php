<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'image',
        'prefecture_id',
    ];

    // questionsテーブルとhasMany関係であることを定義
    public function choices()
    {
        return $this->hasMany('App\Choice');
    }
}
