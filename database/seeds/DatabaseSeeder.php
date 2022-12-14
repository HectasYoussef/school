<?php

use Database\Seeders\BloodTableSeeder;
use Database\Seeders\NationalitiesTableSeeder;
use Database\Seeders\ReligionTableSeeder;
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
     $this->call(BloodTableSeeder::class);
     $this->call(NationalitiesTableSeeder::class);
     $this->call(ReligionTableSeeder::class);
    }
}
