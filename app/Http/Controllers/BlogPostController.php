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
        $validatedData = $request->validate([
            'delete_blog' => 'bail|required|exists:blogs,id',
        ]);
        $blog = Blog::find($request->delete_blog)->delete();
        $post = Post::where('blog_id', $request->delete_blog)->delete();
        return redirect('/blog');
    }

    function blogDesc($name)
    {
        $blogs = Blog::all();
        return view('post', compact('name', 'blogs'));
    }


    function editBlog(Request $request)
    {
        $validatedData = $request->validate([
            'e_blog_id' => 'bail|required|exists:blogs,id',
            'e_blog_creator' => 'bail|required'
        ]);
        Blog::where('id', $request->e_blog_id)->update(['creator' => $request->e_blog_creator]);
        return redirect('/blog');
    }

    function createBlog(Request $request)
    {
        $keyError = false;
        $name = $request->name;
        $blogs = Blog::all();
        $validatedData = $request->validate([
            'name' => 'bail|required|unique:blogs',
            'creator' => 'bail|required',
        ]);

        $blog = new Blog;
        $blog->name = $request->name;
        $blog->creator = $request->creator;
//        $blog->created_at = Carbon::now()->timestamp;
        $blog->save();

        return redirect('/blog');
        
    }
}
