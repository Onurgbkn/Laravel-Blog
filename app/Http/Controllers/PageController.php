<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;

class PageController extends Controller
{
    //
    public function index(){

      $data['posts']=Post::orderBy('created_at', 'DESC')->get();
      return view('layouts.index', $data);
    }

    public function categories(){

      $data['categories']=Category::inRandomOrder()->get();
      return view('layouts.categories', $data);
    }


    public function categoryPosts($slug)
    {
      $category = Category::where('slug', $slug)->first();
      $data['category'] = $category;
      $data['posts'] = Post::where('categoryId', $category->id)->orderBy('created_at', 'DESC')->get();
      return view('layouts.category', $data);
    }

    public function post($slug)
    {
      $data['post'] = Post::where('slug', $slug)->first();
      return view('layouts.post', $data);
    }
}
