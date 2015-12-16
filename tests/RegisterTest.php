<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
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

    public function testUserCanRegister()
    {
        $this->visit('/auth/register')
             ->type('newUser', 'name')
             ->type('userTest@register.com', 'email')
             ->type('userTestpassword', 'password')
             ->type('userTestpassword', 'password_confirmation')
             ->press('Register');
        $this->seeInDatabase('users', ['name' => 'newUser']);
    }
}
