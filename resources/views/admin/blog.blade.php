@extends('admin.dashboard')
@section('content')
<div class="col-auto col-md-9 col-xl-10 mt-3 pl-4">
  <h2>Blogs: {{ count($posts) }}</h2>
  <p>You can restore the trashed blogs.</p>            
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
    @forelse($posts as $key => $post)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->author->username }}</td>
            <td>{{ $post->created_at }}</td>
            <td>
                <a href="/blog/{{ $post->id }}/restore" class="btn btn-info btn-small">Restore</a>
            </td>
        </tr>
    @empty
        <p class="text-warning">No Trashed blog Posts</p>
    @endforelse
    </tbody>
  </table>
</div>
@endsection