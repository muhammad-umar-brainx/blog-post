@extends('blog_post_master')

@section('content')

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
                    @if(isset($blogs))
                        @foreach($blogs as $blog)
                            <option value="{{$blog->id}}">{{$blog->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <button type="submit" id="" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection