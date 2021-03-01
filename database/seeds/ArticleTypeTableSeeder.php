<?php

use Illuminate\Database\Seeder;

class ArticleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Factoryを使ってテストデータを作成
        factory(App\ArticleType::class, 3)->create();
        // DB::table('article_types')->insert([
        //     'name' => 'NEWS',
        //     'slug' => 'news',
        //     'description' => 'ニュースの記事です'
        // ]);
    }
}
