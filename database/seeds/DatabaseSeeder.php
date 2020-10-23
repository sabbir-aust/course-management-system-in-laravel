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

        	'name' => "Ahmed",
        	'email' => "ahmed@gmail.com",
        	'password'=> Hash::make('12345'),
        	'role' => "student"

        ]);

        DB::table('users')->insert([

            'name' => "Karim",
            'email' => "karim@gmail.com",
            'password'=> Hash::make('12345'),
            'role' => "student"

        ]);
            
    }
}
