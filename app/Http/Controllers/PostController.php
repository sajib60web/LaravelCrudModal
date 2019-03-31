<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
    	$posts = Post::orderBy('id', 'DESC')->paginate(5);
    	return view('post.post', compact('posts'));
    }

    public function insert(Request $request)
    {
    	Post::create($request->all());
    	return back();
    }

    public function update(Request $request)
    {
    	$category = Post::find($request->category_id);
    	$category->update($request->all());
    	return back();
    }

    public function delete(Request $request)
    {
    	$category = Post::find($request->category_id);
    	$category->delete();
    	return back();
    }
}
