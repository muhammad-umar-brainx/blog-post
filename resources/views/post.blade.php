@extends('blog_post_master')


@section('content')
    {{--    @php dd($blogs) @endphp--}}

    @include('create_post')

    <div class="container">
        <div class="row mb-2">
            @if(isset($blogPosts))
                @foreach($blogPosts as $post)
                    <div class="container mt-3">
                        <h2 class="d-inline">{{$post->title}}</h2>
                        <button id="edit_{{$post->id}}" class="btn btn-primary" data-toggle="modal"
                                data-target="#editPost" data-whatever="@getbootstrap">Edit
                        </button>
                        <button id="delete_{{$post->id}}" class="btn btn-danger">Delete</button>
                        <div class="media border p-3">
                            <div class="media-body">
                                <h4>{{$post->author }} <small><i>{{$post->created_at}}</i></small></h4>
                                <p>{{$post->content}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>


    <div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action("PostController@editPost") }}" method="POST"
                          class="was-validated">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="postId"></input>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" id="post_title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Content:</label>
                            <textarea class="form-control" id="post_content" name="post_content"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        $(function () {
            $("[id^='delete_']").click(function () {
                let post_id = $(this).attr('id');
                post_id = post_id.replace("delete_", "");
                let blog_id = "delete_blog_id_" + post_id;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.post('/delete-post',
                            {
                                '_token': '{{csrf_token()}}',
                                id: post_id,
                            },
                            function (data, status) {
                                // alert("Data: " + data + "\nStatus: " + status);
                                Swal.fire(
                                    'Deleted!',
                                    'Your post has been deleted.',
                                    'success'
                                );
                                // alert("Data "+data + " status : " +status);
                                $(`#delete_${data}`).parent().remove();
                            }
                        );

                    }
                });

            });

            $("[id^='edit_']").click(function () {
                let id = $(this).attr('id');
                id = id.replace("edit_", "");
                $('#postId').val(id);
            });
        });

    </script>

@endsection