<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    public function run(){
        ### 作成したファイルが実行されるように登録しておく
        // $this->call(UsersTableSeeder::class);
        // $this->call(StationeryTableSeeder::class);
        // $this->call(PeopleTableSeeder::class);
        // $this->call(BoardTableSeeder::class);
        $this->call(RestdataTableSeeder::class);
    }
}
