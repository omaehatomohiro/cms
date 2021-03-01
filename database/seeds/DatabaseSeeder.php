<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 各seederを呼び出す
        $this->call(UsersTableSeeder::class);
        $this->call([ArticleTypeTableSeeder::class]);
        $this->call([CategoryTableSeeder::class]);
    }
}