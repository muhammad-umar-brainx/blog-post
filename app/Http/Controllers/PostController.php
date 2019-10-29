<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPost($name)
    {
        $id = Blog::where('name', $name)->first()->id;
        $blogPosts = Post::where('blog_id', $id)->get();
//        dd($blogPosts);
        return view('post', compact('blogPosts', 'name', 'id'));
    }

    public function editPost(Request $request)
    {
        $post = Post::where('id', $request->postId);

        Post::where('id', $request->postId)->update(['title' => $request->postTitle, 'content' => $request->postContent]);

//        return Redirect::back()->with('message','Operation Successful !');
        return redirect()->back();
//        dd($request->all());
    }

    function createPost(Request $request)
    {
//        dd($request->all());
        $post = new Post();

        $post->content = $request->post_content;
        $post->title = $request->post_name;
        $post->author = $request->post_author;
        $post->blog_id = $request->blog_id;

        $post->save();

        return redirect()->back();
    }

    public function deletePost(Request $request)
    {
        $id = $request->postId;

        Post::find($id)->delete();


//        dd($request->all());
        return $id;
    }
}
