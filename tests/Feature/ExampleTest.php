<?php

namespace Tests\Feature;
use App\Models\BlogPost;
use App\Models\BlogComment;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_application_returns_the_retriving_posts_successful_response()
    {
        $response = $this->get('/api/blogs');
        
        $response->assertStatus(200);
    }

    public function test_the_application_returns_the_retriving_comments_successful_response()
    {
        $response = $this->get('/api/comments');
        
        $response->assertStatus(200);
    }

    public function test_the_application_returns_the_retriving_users_successful_response()
    {
        $response = $this->get('/api/users');
        
        $response->assertStatus(200);
    }
}
