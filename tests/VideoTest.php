<?php

use App\Video;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VideoTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testAddVideo()
    {
        $user = factory('App\User')->create();

        $this->actingAs($user)
             ->visit('/videos/create')
             ->type('Sugar', 'title')
             ->type('https://www.youtube.com/watch?v=bvC_0foemLY', 'url')
             ->type('Awesome song', 'description')
             ->type('pop', 'category')
             ->press('Save');

        $this->seeInDatabase('videos', ['title' => 'Sugar']);

        $this->actingAs($user)
             ->visit('/videos/create')
             ->type('Headlights', 'title')
             ->type('https://www.youtube.com/watch?v=vAEwLvxHVVk', 'url')
             ->type('Feel Good Song', 'description')
             ->type('rock', 'category')
             ->press('Save');

        $this->seeInDatabase('videos', ['title' => 'Headlights']);
    }

    public function testDeleteVideo()
    {
        $user = factory('App\User')->create();

        $this->actingAs($user)
             ->visit('/videos/create')
             ->type('Sugar', 'title')
             ->type('https://www.youtube.com/watch?v=bvC_0foemLY', 'url')
             ->type('Awesome song', 'description')
             ->type('pop', 'category')
             ->press('Save');

        $this->seeInDatabase('videos', ['title' => 'Sugar']);

        $this->actingAs($user)
             ->visit('/videos/create')
             ->type('Headlights', 'title')
             ->type('https://www.youtube.com/watch?v=vAEwLvxHVVk', 'url')
             ->type('Feel Good Song', 'description')
             ->type('rock', 'category')
             ->press('Save');

        $this->seeInDatabase('videos', ['title' => 'Headlights']);

        $this->actingAs($user)
             ->visit('/videos')
             ->press('Delete');

        $videos = Video::all();

        $this->assertEquals(count($videos), 1);

        $this->actingAs($user)
             ->visit('/videos')
             ->press('Delete');

        $videos = Video::all();

        $this->assertEquals(count($videos), 0);
    }
}
