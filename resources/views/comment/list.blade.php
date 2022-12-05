@guest
<p class="text-warning">Login to submit comment</p>
@else
@include('comment/form')
@endguest
<h3>{{ count($comments) }} Comments</h3>
<hr>
@forelse($comments as $comment)
    
    <ul>
        <!-- <li><a href="./blog/{{ $post->id }}">{{ ucfirst($post->title) }}</a></li> -->
        <div class="card">
            <div class="card-body">
                <p class="card-text">{{ $comment->content }}</p>
                <p class="card-text">Author: {{ $comment->username }} Date: {{ $comment->created_at }}</p>
                <!-- <form id="delete-frm" class="" action="/comment/{{ $comment->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Comment</button>
                </form> -->
                @guest
                @else
                <a href="/comment/{{ $comment->id }}/trash" class="btn btn-danger">Trash</a>
                @endguest
            </div>
        </div>
    </ul>
@empty
    <p class="text-warning">No comment available</p>
@endforelse