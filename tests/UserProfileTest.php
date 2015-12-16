<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserProfileTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testUpdateProfileInfo()
    {
        $user = factory('App\User')->create();

        $this->actingAs($user)
             ->visit('/user/profile/edit')
             ->type('NewUser', 'name')
             ->type('newuser@newuser.com', 'email')
             ->press('Update');

        $this->seeInDatabase('users', ['name' => 'NewUser']);
    }
}
