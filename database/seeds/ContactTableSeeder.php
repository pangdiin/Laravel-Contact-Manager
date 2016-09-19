<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ContactTableSeeder extends Seeder
{
   
    public function run()
    {
        DB::table('contacts')->delete();

        $faker = Faker::create();
        $contacts = [];

        foreacH (range(1, 20) as $index)
        {
        	$contacts[] = [
        		'name' => $faker->name,
        		'email'=> $faker->email,
        		'phone'=> $faker->phoneNumber,
        		'address'=> "{$faker->streetName} {$faker->postCode} {$faker->city}",
        		'company' => $faker->company,
        		'created_at'=> new DateTime,
        		'updated_at'=> new DateTime,
        		'group_id'=> rand(1,3),
        	];
        }

        DB::table('contacts')->insert($contacts);
    }
}
