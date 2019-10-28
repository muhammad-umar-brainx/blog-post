@extends('blog_post_master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>Blog Id</th>
                        <th>Blog Name</th>
                        <th>Creator</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </thead>
                        <tbody>
                        @if( isset($blogs) )
                            @foreach($blogs as $blog)
                                <tr>
                                    {{--                                    <td><input type="checkbox" class="checkthis"/></td>--}}
                                    <td id="blog_id_{{$blog->id}}">{{$blog->id}}</td>
                                    <td id="blog_name_{{$blog->id}}"><a
                                                href="blog/{{$blog->name}}">{{$blog->name}}</a></td>
                                    <td id="blog_creator_{{$blog->id}}">{{$blog->creator}}</td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Edit"
                                           id="edit_{{$blog->id}}">
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                                                    data-target="#edit"><span class="glyphicon glyphicon-pencil"></span>
                                            </button>
                                        </p>
                                    </td>
                                    <td id="delete_{{$blog->id}}">
                                        <p data-placement="top" data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger btn-xs" data-title="Delete"
                                                    data-toggle="modal" data-target="#delete"><span
                                                        class="glyphicon glyphicon-trash"></span></button>
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ action("BlogPostController@createBlog") }}" method="POST"
          class="was-validated form-inline text-center">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Enter blog name to create : </label>
            <input type="text" class="form-control" id="name" placeholder="Enter blog name"
                   name="name">
        </div>
        <div class="form-group d-block">
            <label for="creator">Enter your name : </label>
            <input type="text" class="form-control" id="creator" placeholder="Enter your name"
                   name="creator">
        </div>
        <button type="submit" id="" class="btn btn-primary">Submit</button>
    </form>


    @if( isset($keyError) and $keyError == true )
        {{--        {{}}--}}
        <script>
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Blog {{$name}} already exist',
                // footer: '<a href>Why do I have this issue?</a>'
            })
        </script>
    @elseif( isset($keyError) and $keyError == false )
        <script>
            Swal.fire({
                type: 'success',
                title: 'Nice work',
                text: 'Blog {{$name}} created',
                // footer: '<a href>Why do I have this issue?</a>'
            })
        </script>
    @endif


    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                </div>


                <div class="modal-body">

                    <form action="{{ action("BlogPostController@editBlog") }}" method="POST"
                          class="was-validated text-center">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input class="form-control " type="text" placeholder="" id="e_blog_id" name="e_blog_id"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <input class="form-control " type="text" placeholder="" id="e_blog_name" name="e_blog_name"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <input class="form-control " type="text" placeholder="" id="e_blog_creator"
                                   name="e_blog_creator">
                        </div>


                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span
                                        class="glyphicon glyphicon-ok-sign"></span> Update
                            </button>
                        </div>

                    </form>

                </div>


            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure
                        you want to delete this Record?
                    </div>

                </div>
                <div class="modal-footer">


                    <form action="{{ action("BlogPostController@deleteBlog") }}" method="POST"
                          class="was-validated">
                        {{ csrf_field() }}
                        <input type="hidden" name="delete_blog">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Yes
                        </button>
                    </form>

                    <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> No
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



    <script src="{{URL::asset('js/blog.js')}}"></script>
@endsection