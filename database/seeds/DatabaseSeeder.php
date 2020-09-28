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
        // $this->call(UserSeeder::class);
        DB ::table('users')->insert([
        	'name'=> "Sabbir",
        	'email'=> "sabbir@gmail.com",
        	'password'=> Hash::make('12345'),
        	"role"=> "admin"

        ]);
    }
}
