@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Create a New Post</h1>
                    <p>Fill and submit this form to create a post</p>

                    <hr>

                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Post Title</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Enter Post Title" required>
                                <span class="text-danger" id="over-error"></span>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Post Body</label>
                                <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body" rows="10" required></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Create Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        let post_title = document.getElementById("title");
        post_title.addEventListener("input", () => {
            let count = (post_title.value).length;
            if (count >= 64) {
                document.getElementById("over-error").textContent = `Maximum length for subject on the new blog post is 64 characters. Current characters: ${count}`;
                document.getElementById("btn-submit").disabled = true;
            } else {
                document.getElementById("over-error").textContent = '';
                document.getElementById("btn-submit").disabled = false;
            }
        });
    </script>
@endsection