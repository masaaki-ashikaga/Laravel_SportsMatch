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
        $this->call(EventSportSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
