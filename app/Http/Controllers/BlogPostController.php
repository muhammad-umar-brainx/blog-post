<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Blog;

class BlogPostController extends Controller
{
    function index(Request $request)
    {
        $blogs = Blog::all();
        return view('blog', compact('blogs'));
    }

    function deleteBlog(Request $request)
    {
        $blog = Blog::find($request->delete_blog)->delete();
        return redirect('/blog');
    }

    function blogDesc($name)
    {
        $blogs = Blog::all();


//        $count = $blog->count();
        return view('post', compact('name', 'blogs'));
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

        $blog_name = Blog::find($request->blog_id)->name;

        return redirect("blog/$blog_name");
    }


    public function getAllPost($id)
    {
//        $posts = Blog::find($id)->posts();
        $posts = Post::where();
    }


    function editBlog(Request $request)
    {

        Blog::where('id',$request->e_blog_id)->update(['creator' => $request->e_blog_creator]);

        return redirect('/blog');
    }

    function createBlog(Request $request)
    {
//    dd($request->all());
        $keyError = false;
        $name = $request->name;
        $blogs = Blog::all();
        try{
            $blog = new Blog;
            $blog->name = $request->name;
            $blog->creator = $request->creator;
//        $blog->created_at = Carbon::now()->timestamp;
            $blog->save();
        }
        catch (\Exception $e){
            $keyError = true;
        }
        finally{
            return redirect('/blog');
        }
    }
}
