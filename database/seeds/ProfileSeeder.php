<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            [
                'name' => '佐藤太郎',
                'gender' => '男性',
                'hobby' => 'サッカー',
                'introduction' => 'サッカー大好きです！！',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => '山田花子',
                'gender' => '女性',
                'hobby' => '犬と散歩すること',
                'introduction' => '柴犬飼ってます',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ]);
    }
}

