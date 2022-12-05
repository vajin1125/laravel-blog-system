<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BlogPost;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, BlogPost $blogPost)
    {
        // $posts = BlogPost::all(); //fetch all blog posts from DB
        // var_dump(BlogPost::with('author')->withCount('comments')->orderBy('comments_count', 'desc')->get());
        // var_dump(Session::all());
	    return view('blog.index', [
            'posts' => BlogPost::with('author')->withCount('blogComments')->where('is_trash', '!=', 1)->orderBy('blog_comments_count', 'desc')->paginate(12),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id()
        ]);

        return redirect('blog/' . $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        $comments = DB::table('blog_comments')
                        ->join('users', 'blog_comments.user_id', '=', 'users.id')
                        ->select('blog_comments.*', 'users.username')
                        ->where('blog_comments.blog_post_id', '=', $blogPost->id)
                        ->where('blog_comments.is_trash', '!=', 1)
                        ->get();
        return view('blog.show', [
            'post' => $blogPost,
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        return view('blog.edit', [
            'post' => $blogPost,
        ]); //returns the edit view with the post
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('blog/' . $blogPost->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();

        return redirect('/blog');
    }

    public function trash(BlogPost $blogPost)
    {
        $blogPost->update([
            'is_trash' => 1
        ]);

        return redirect('/blog');
    }

    public function restore(BlogPost $blogPost)
    {
        $blogPost->update([
            'is_trash' => 0
        ]);

        return redirect('/admin/blogs');
    }
}
