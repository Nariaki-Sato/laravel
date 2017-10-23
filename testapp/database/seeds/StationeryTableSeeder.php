<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; # DBクラスの利用を追記

class StationeryTableSeeder extends Seeder{
    public function run() {
        $params = [
            'name' => 'pencil'
        ];
        DB::table('stationery')->insert($params);

        $params = [
            'name' => 'pen'
        ];
        DB::table('stationery')->insert($params);

        $params = [
            'name' => 'eraser'
        ];
        DB::table('stationery')->insert($params);

        $params = [
            'name' => 'ruler'
        ];
        DB::table('stationery')->insert($params);

    }
}
