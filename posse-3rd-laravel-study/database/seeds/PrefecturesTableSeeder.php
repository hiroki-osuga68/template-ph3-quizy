<?php

use Illuminate\Database\Seeder;
// DBファサードの追加
use Illuminate\Support\Facades\DB;
class PrefecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            [
              'name' => '東京'
            ],
            [
              'name' => '広島'
            ]
          ];
          DB::table('prefectures')->insert($param);
    }
}
