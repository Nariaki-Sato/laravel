<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; # DBクラスの利用を追記


class BoardTableSeeder extends Seeder
{
    public function run()
    {
        $titles = ['Hello', 'Great', 'Wow', 'Go Home', 'OMG', 'Hello', 'Great', 'Wow', 'Go Home', 'OMG', ];
        $messages = ['first', 'second', 'third', 'forth', 'fifth', 'sixth', 'seventh', 'eighth', 'ninth', 'tenth', ];

        for($i=0; $i<10; $i++) {
            $params = [
                'person_id' => rand(1,7),
                'title' => $titles[$i],
                'message' => $messages[$i],
            ];
            DB::table('boards')->insert($params);
        }

    }
}
