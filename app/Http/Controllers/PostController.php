<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPost($name)
    {
        $id = Blog::where('name', $name)->first();
        if(!$id){
            return redirect('/blog');
        }
        $id = $id->id;
        $blogPosts = Post::where('blog_id', $id)->orderBy('created_at', 'desc')->get();
        return view('post', compact('blogPosts', 'name', 'id'));
    }

    public function editPost(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'bail|required',
            'title' => 'required',
            'post_content' => 'required',
        ]);
        $post = Post::where('id', $request->id);
        Post::where('id', $request->id)->update(['title' => $request->title, 'content' => $request->post_content]);
        return redirect()->back();
    }

    function createPost(Request $request)
    {

        $validatedData = $request->validate([
            'post_content' => 'bail|required',
            'post_name' => 'bail|required',
            'post_author' => 'bail|required',
            'blog_id' => 'bail|required',
        ]);

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
        $validatedData = $request->validate([
            'id' => 'bail|required|exists:posts',
        ]);
        Post::find($request->id)->delete();
        return $request->id;
    }
}
