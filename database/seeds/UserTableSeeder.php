<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        /*
         * If user has manually logged in
         */
        factory('App\User')->create([
            'name' => 'userOne',
            'email' => 'userOne@userOne.com',
            'password' => bcrypt('password'),
        ]);

        /*
         * If user has logged in using google
         */
        factory('App\User')->create([
            'name' => 'userTwo',
            'provider' => 'google',
            'provider_id' => str_random(32),
        ]);

        /*
         * Logging in different vaariety of users
         */
        factory('App\User', 5)->create();
    }
}
