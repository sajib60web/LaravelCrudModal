<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	return view('category.category', compact('categories'));
    }

    public function insert(Request $request)
    {
    	Category::create($request->all());
    	return back();
    }

    public function update(Request $request)
    {
    	$category = Category::find($request->category_id);
    	$category->update($request->all());
    	return back();
    }

    public function delete(Request $request)
    {
    	$category = Category::find($request->category_id);
    	$category->delete();
    	return back();
    }
}
