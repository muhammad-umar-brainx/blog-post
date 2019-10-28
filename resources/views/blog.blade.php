@extends('blog_header')


@section('content2')
    <div class="list-group">
        <a href="#" class="list-group-item active">First item</a>
        <a href="#" class="list-group-item">Second item</a>
        <a href="#" class="list-group-item">Third item</a>
    </div>
    <form action="{{ action("BlogPostController@createBlog") }}" method="POST" class="was-validated form-inline text-center"    >
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Enter blog name to create : </label>
            <input type="text" class="form-control" id="name" placeholder="Enter blog name" name="name">
        </div>
        <div class="form-group d-block">
            <label for="creator">Enter your name : </label>
            <input type="text" class="form-control" id="creator" placeholder="Enter your name" name="creator">
        </div>
        <button type="submit" id="" class="btn btn-primary">Submit</button>
    </form>
@endsection