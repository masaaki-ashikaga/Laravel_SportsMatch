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
        $this->call(SportTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TeamTableSeeder::class);
        $this->call(TeamUserSeeder::class);
        $this->call(EventUserSeeder::class);
        $this->call(SportTeamSeeder::class);
    }
}