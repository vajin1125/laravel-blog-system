<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\BlogPost;
use App\Models\BlogComment;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Test the user database.
     *
     * @return void
     */
    public function test_user_database()
    {
        User::factory(1)->create();
        $this->assertDatabaseCount('users', 1);
    }

    public function test_blog_post_database()
    {
        BlogPost::factory(1)->create();
        $this->assertDatabaseCount('blog_posts', 1);
    }

    public function test_blog_comment_database()
    {
        BlogComment::factory(1)->create();
        $this->assertDatabaseCount('blog_comments', 1);
    }
}
