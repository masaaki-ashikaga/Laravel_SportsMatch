<?php

use Illuminate\Database\Seeder;

class EventSportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 50; $i++){
            DB::table('event_sport')->insert([
                'event_id' => $i,
                'sport_id' => random_int(1, 8),
            ]);
        }
    }
}
