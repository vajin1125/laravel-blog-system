<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Role;
use App\Models\BlogPost;
use App\Models\BlogComment;
use Tests\TestCase;

class BlogCommentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    
    public function test_search_comment()
    {
        BlogComment:: factory()->create(['content' => 'The body of test blog comment.']);

        $this->assertCount(0, BlogComment::where('content', 'hi')->get());
        $this->assertCount(1, BlogComment::where('content', 'LIKE', '%'.'test blog comment'.'%')->get());
    }
}
