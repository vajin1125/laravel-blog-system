<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BlogPost;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // return view('admin.dashboard');
        return redirect('/admin/blogs');
    }

    public function blogs()
    {
        return view('admin.blog', [
            'posts' => BlogPost::with('author')->withCount('blogComments')->where('is_trash', '=', 1)->orderBy('blog_comments_count', 'desc')->get(),
        ]);
    }

    public function comments()
    {
        return view('admin.comment', [
            'comments' => DB::table('blog_comments')
                            ->join('users', 'blog_comments.user_id', '=', 'users.id')
                            ->select('blog_comments.*', 'users.username')
                            ->where('blog_comments.is_trash', '=', 1)
                            ->get(),
        ]);
    }
}
