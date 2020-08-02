<?php

use Illuminate\Database\Seeder;

class SportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sports')->insert([
            'sport' => 'サッカー',
            'imagepath' => 'soccer.jpg',
        ]);

        DB::table('sports')->insert([
            'sport' => '野球',
            'imagepath' => 'baseball.jpg',
        ]);

        DB::table('sports')->insert([
            'sport' => 'ランニング',
            'imagepath' => 'running.jpg',
        ]);

        DB::table('sports')->insert([
            'sport' => 'バスケットボール',
            'imagepath' => 'basketball.jpg',
        ]);

        DB::table('sports')->insert([
            'sport' => 'バレーボール',
            'imagepath' => 'volleyball.jpg',
        ]);

        DB::table('sports')->insert([
            'sport' => 'テニス',
            'imagepath' => 'tennis.jpg',
        ]);

        DB::table('sports')->insert([
            'sport' => 'ヨガ',
            'imagepath' => 'yoga.jpg',
        ]);

        DB::table('sports')->insert([
            'sport' => 'バドミントン',
            'imagepath' => 'badminton.jpg',
        ]);

    }
}
