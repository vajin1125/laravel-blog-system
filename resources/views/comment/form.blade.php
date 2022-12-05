<!-- Comment form-->
<form id="comment-form" action="/comment/create" method="POST">
    @csrf
    <div class="row">
        <div class="control-group col-12 mt-2">
            <label for="commemt-body">Comment body</label>
            <textarea id="content" class="form-control" name="content" placeholder="Enter Comment Body" rows="5" required></textarea>
            <span class="text-danger" id="over-error"></span>
        </div>
    </div>
    <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}" />
    <div class="row mt-2">
        <div class="control-group col-12 text-center">
            <button id="btn-submit" class="btn btn-primary">
                Submit comment
            </button>
        </div>
    </div>
</form>
<script>
    let comment_content = document.getElementById("content");
    comment_content.addEventListener("input", () => {
        let count = (comment_content.value).length;
        if (count >= 255) {
            document.getElementById("over-error").textContent = `Maximum length for comment is 255 characters. Current characters: ${count}`;
            document.getElementById("btn-submit").disabled = true;
        } else {
            document.getElementById("over-error").textContent = '';
            document.getElementById("btn-submit").disabled = false;
        }
    });
</script>