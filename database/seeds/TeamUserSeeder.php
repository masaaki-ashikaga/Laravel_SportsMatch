<?php

use Illuminate\Database\Seeder;

class TeamUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($e = 1; $e <= 10; $e++){
            for($i = 1; $i <= 10; $i++){
                DB::table('team_user')->insert([
                    'team_id' => $e,
                    'user_id' => $i,
                    'owner_user' => false,
                ]);
            }
        }

        for($i = 11; $i <= 20; $i++){
            DB::table('team_user')->insert([
                'team_id' => $i - 10,
                'user_id' => $i,
                'owner_user' => true,
            ]);
        }
    }
}
