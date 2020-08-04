<?php

use Illuminate\Database\Seeder;

class SportUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 20; $i++){
            DB::table('sport_user')->insert([
                'sport_id' => random_int(1, 8),
                'user_id' => $i,
            ]);
        }
    }
}
