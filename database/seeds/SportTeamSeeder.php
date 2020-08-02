<?php

use Illuminate\Database\Seeder;

class SportTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 50; $i++){
            DB::table('sport_team')->insert([
                'team_id' => $i,
                'sport_id' => random_int(1, 8),
            ]);
        }
    }
}
