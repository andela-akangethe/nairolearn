<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function userCanLogin()
    {
        $this->seed('UserTableSeeder');

        $this->visit('/auth/login')
             ->type('userOne@userOne.com', 'email')
             ->type('password', 'password')
             ->press('Login')
             ->see('userOne');
    }
}
