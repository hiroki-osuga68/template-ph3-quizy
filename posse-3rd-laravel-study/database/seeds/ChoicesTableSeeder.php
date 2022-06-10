<?php

use Illuminate\Database\Seeder;
// DBファサードの追加
use Illuminate\Support\Facades\DB;

class ChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            [
                'choice' => 'たかなわ',
                'valid' => 1,
                'question_id' => 1,
            ],
            [
                'choice' => 'たかわ',
                'valid' => 0,
                'question_id' => 1,
            ],
            [
                'choice' => 'こうわ',
                'valid' => 0,
                'question_id' => 1,
            ],
            [
                'choice' => 'かめいど',
                'valid' => 1,
                'question_id' => 2,
            ],
            [
                'choice' => 'かめと',
                'valid' => 0,
                'question_id' => 2,
            ],
            [
                'choice' => 'かめど',
                'valid' => 0,
                'question_id' => 2,
            ],
            [
                'choice' => 'むかいなだ',
                'valid' => 1,
                'question_id' => 3,
            ],
            [
                'choice' => 'むこうひら',
                'valid' => 0,
                'question_id' => 3,
            ],
            [
                'choice' => 'むきひら',
                'valid' => 0,
                'question_id' => 3,
            ],
            [
                'choice' => 'みつぎ',
                'valid' => 1,
                'question_id' => 4,
            ],
            [
                'choice' => 'みよし',
                'valid' => 0,
                'question_id' => 4,
            ],
            [
                'choice' => 'おしらべ',
                'valid' => 0,
                'question_id' => 4,
            ],
        ];
        DB::table('choices')->insert($param);
    }
}
