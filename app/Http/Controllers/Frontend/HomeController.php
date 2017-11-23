<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::with('category')->paginate(6);

        $background = Post::where('slug','background')->get();

    	return view('welcome', compact('posts','background'));
    }
    public function postShow($id)
    {
    	$posts = Post::with('category','author')->where('slug',$id)->first();


        return view('backend.blog.show')->withPosts($posts);
    }
}
