<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Role;
use App\Models\BlogPost;
use App\Models\BlogComment;
use Tests\TestCase;

class BlogPostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_blog_post_search()
    {
        BlogPost:: factory()->create(['title' => 'Test blog.', 'body' => 'The body of test blog.']);

        $this->assertCount(0, BlogPost::where('title', 'hi')->get());
        $this->assertCount(1, BlogPost::where('body', 'LIKE', '%'.'test blog'.'%')->get());
    }
}
