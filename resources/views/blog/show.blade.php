@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
                <p>{!! $post->body !!}</p>
                @if(Auth::check())
                    @if (Auth::user()->name == 'Admin')
                        <a href="/blog/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit Post</a>
                    @endif
                @endif
                @guest
                @else
                    <a href="/blog/{{ $post->id }}/trash" class="btn btn-danger">Trash</a>
                @endguest
                <hr>

                @include('comment/list')
                
            </div>
        </div>
    </div>
@endsection