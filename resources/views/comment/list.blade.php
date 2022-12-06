@guest
<p class="text-warning">Login to submit comment</p>
@else
@include('comment/form')
@endguest
<h3>{{ count($comments) }} Comments</h3>
<hr>
@forelse($comments as $comment)
    <ul>
        <div class="card">
            <div class="card-body">
                <p class="card-text">{{ $comment->content }}</p>
                <p class="card-text">Author: {{ $comment->username }} Date: {{ $comment->created_at }}</p>
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