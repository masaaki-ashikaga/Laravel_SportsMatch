<?php

use Illuminate\Database\Seeder;

class EventUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($e = 1; $e <= 20; $e++){
            for($i = 1; $i <= 20; $i++){
                DB::table('event_user')->insert([
                    'event_id' => $e,
                    'user_id' => $i,
                    'owner_user' => false,
                ]);
            }
        }

        for($i = 21; $i <= 40; $i++){
            DB::table('event_user')->insert([
                'event_id' => $i - 20,
                'user_id' => $i,
                'owner_user' => true,
            ]);
        }
    }
}
