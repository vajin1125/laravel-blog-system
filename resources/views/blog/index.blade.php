@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Our Blog!</h1>
                        <p>Enjoy reading our posts. Click on a post to read!</p>
                    </div>
                    <div class="col-4">
                        @guest
                        <span class="text-info">Login to create new post</span>
                        @else
                        <a href="/blog/create/post" class="btn btn-primary btn-sm">Create Post</a>
                        @endguest
                    </div>
                </div> 
            </div>
        </div>
        <div class="row">
            {{ $posts->links() }}
            @forelse($posts as $post)
                <!-- <ul> -->
                    <!-- <li><a href="./blog/{{ $post->id }}">{{ ucfirst($post->title) }}</a></li> -->
                    <!-- <div class="col-3 m-2 flex card" style="height:400px;">
                        <div class="card-body">
                            <h4 class="card-title"><a href="./blog/{{ $post->id }}">{{ ucfirst($post->title) }}</a></h4>
                            <div style="height:200px; overflow:hidden; text-overflow: ellipsis;">
                                <p class="card-body">{{ $post->body }}</p>
                            </div>
                            <p class="card-text">Author: {{ $post->author->username }} Date: {{ $post->created_at }} Total comments: {{ $post->blog_comments_count }}</p>
                        </div>
                    </div> -->
                <!-- </ul> -->
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 d-flex">
                    <div class="card mb-4">
                        <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/pasta.jpg" alt="Bologna">
                        <!-- <div class="card-img-overlay">
                            <a href="./blog/{{ $post->id }}" class="btn btn-light btn-sm">asdfasdf</a>
                        </div> -->
                        <div class="card-body">
                            <h4 class="card-title"><a href="./blog/{{ $post->id }}">{{ $post->title }}</a></h4>
                            <div style="position:absolute">
                                <p class="card-text">{{ Str::limit($post->body, 40) }}</p>
                            </div>
                            <!-- <a href="./blog/{{ $post->id }}" class="btn btn-info">Read</a> -->
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                            <div class="views">
                                <p class="card-text">Author: {{ $post->author->username }}
                                <p class="card-text">Created: {{ $post->created_at }}
                            </div>
                            <div class="stats">
                                <i class="far fa-comment"></i> {{ $post->blog_comments_count }}
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-warning">No blog Posts available</p>
            @endforelse
            {{ $posts->links() }}
        </div>
    </div>
@endsection