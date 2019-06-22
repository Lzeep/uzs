<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccessorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
        $db_post = DB::select('select * from subjects where id = 20');
        $db_post_title = ucfirst($db_post[0]->owner);

        $response = $this->get('/subject/20');

        $response->assertStatus(200);
        $response->assertSeeText($db_post_title);
    }
}
