<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::with('category')->get();

        $background = Post::where('slug','background')->get();

        $carousels = Post::where('slug','carousel')->get();     

        $news= Post::with('category')->where('post_type_id','7956b672-207a-450f-a056-040d9612e497')->paginate(6);   

    	return view('welcome', compact('posts','background','carousels','news'));
    }
    public function postShow($id)
    {
    	$posts = Post::with('category','author')->where('slug',$id)->first();


        return view('backend.blog.show')->withPosts($posts);
    }
}
