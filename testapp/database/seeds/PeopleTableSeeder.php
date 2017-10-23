<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; # DBクラスの利用を追記

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $params = [
            'name' => 'teruya',
            'sex' => 'M',
            'age' => 33,
        ];
        DB::table('people')->insert($params);

        $params = [
            'name' => 'tomita',
            'sex' => 'W',
            'age' => 36,
        ];
        DB::table('people')->insert($params);

        $params = [
            'name' => 'uehara',
            'sex' => 'M',
            'age' => 25,
        ];
        DB::table('people')->insert($params);

        $params = [
            'name' => 'takara',
            'sex' => 'W',
            'age' => 31,
        ];
        DB::table('people')->insert($params);

        $params = [
            'name' => 'kubo',
            'sex' => 'W',
            'age' => 29,
        ];
        DB::table('people')->insert($params);

        $params = [
            'name' => 'amon',
            'sex' => 'M',
            'age' => 22,
        ];
        DB::table('people')->insert($params);

        $params = [
            'name' => 'nishizato',
            'sex' => 'M',
            'age' => 20,
        ];
        DB::table('people')->insert($params);

    }
}
