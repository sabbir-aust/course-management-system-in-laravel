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
        //$this->call(UserSeeder::class);

        DB::table('users')->insert([

        	'name' => "Sabbir",
        	'email' => "sabbir@gmail.com",
        	'password'=> Hash::make('12345'),
        	'role' => "admin"

        ]);

        DB::table('users')->insert([

        	'name' => "Sabbir",
        	'email' => "sabbir@email.com",
        	'password'=> Hash::make('12345'),
        	'role' => "student"

        ]);

        DB::table('users')->insert([

        	'name' => "Swarna",
        	'email' => "swarna@gmail.com",
        	'password'=> Hash::make('12345'),
        	'role' => "student"

        ]);
            
    }
}
