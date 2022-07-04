<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $fillable = [
        'name',
    ];

    // questionsテーブルとhasMany関係であることを定義
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
