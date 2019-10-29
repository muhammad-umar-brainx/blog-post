<div class="container">
        <form action="/store-post" method="POST"
          class="was-validated text-center">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" id="name" placeholder="Post title"
                   name="post_name" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="creator" placeholder="Author"
                   name="post_author" required>
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" rows="5" name="post_content" required></textarea>
        </div>

        <div class="form-group">
            <label>Select Blog</label>
            <select class="form-control" name="blog_id">
                <option value="{{$id}}">{{$name}}</option>
            </select>
        </div>

        <button type="submit" id="" class="btn btn-primary">Submit</button>
    </form>
</div>