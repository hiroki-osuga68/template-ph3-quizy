<?php

use Illuminate\Database\Seeder;
// DBファサードの追加
use Illuminate\Support\Facades\DB;
class QuestionsTableSeeder extends Seeder
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
              'image' => 'Tokyo1.png',
              'prefecture_id' => '1'
            ],
            [
              'image' => 'Tokyo2.png',
              'prefecture_id' => '1'
            ],
            [
              'image' => 'Hiroshima1.png',
              'prefecture_id' => '2'
            ],
            [
              'image' => 'Hiroshima2.png',
              'prefecture_id' => '2'
            ],
          ];
        DB::table('questions')->insert($param);
    }
}
