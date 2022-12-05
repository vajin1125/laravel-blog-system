@extends('admin.dashboard')
@section('content')
<div class="col-auto col-md-9 col-xl-10 mt-3 pl-4">
  <h2>Comments: {{ count($comments) }}</h2>
  <p>You can restore the trashed comments.</p>            
  <table class="table table-striped table-sm table-responsive-md">
    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>author</th>
        <th>created_at</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody>
    @forelse($comments as $key => $comment)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $comment->content }}</td>
            <td>{{ $comment->username }}</td>
            <td>{{ $comment->created_at }}</td>
            <td>
                <a href="/comment/{{ $comment->id }}/restore" class="btn btn-info btn-small">Restore</a>
            </td>
        </tr>
    @empty
        <p class="text-warning">No Trashed blog comments</p>
    @endforelse
    </tbody>
  </table>
</div>
@endsection