<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Blog;

class BlogPostController extends Controller
{
    function index(Request $request)
    {
        return view('blog');
    }

    function createBlog(Request $request){
//    dd($request->all());
        $blog = new Blog;
        $blog->name = $request->name;
        $blog->creator = $request->creator;
//        $blog->created_at = Carbon::now()->timestamp;
        $blog->save();

        $name = $request->name;

        return view('blog', compact('name'));
    }
}
