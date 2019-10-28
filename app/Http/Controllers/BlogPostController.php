<?php

namespace App\Http\Controllers;

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
//        dd($request->all());
        $blog = Blog::find($request->delete_blog);
        $blog->delete();
        return redirect('/blog');
    }

    function blogDesc($name)
    {
        $blog = Blog::where('name', $name);
//        $count = $blog->count();
        return view('post', compact('name'));
    }

    function editBlog(Request $request)
    {
        $blog = Blog::find($request->e_blog_id);

        $blog->creator = $request->e_blog_creator;

        $blog->save();

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
            return view('blog', compact('name', 'keyError', 'blogs'));
        }
    }
}
