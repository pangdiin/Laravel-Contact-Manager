<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call(GroupTableSeeder::class);
        $this->call(ContactTableSeeder::class);
    }
}
