<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{

    public function index()
    {
        $data['loggedUserInfo']=Admin::where('id', '=', session('loggedUser'))->first();

        $data['posts']=Post::orderBy('created_at', 'DESC')->get();

        $data['categories']=Category::orderBy('name')->get();


        return view('admin.posts.posts', $data);
    }



    public function create(Request $request)
    {

        $request->validate([
            'title'=>'required|min:5',
            'category'=>'required',
            'editor1' => 'required',
        ]);

        $category = Category::where('name', '=', $request->category)->first();



        $post = new Post;
        $post->title = $request->title;
        $post->categoryId = $category->id;
        $post->adminId = session('loggedUser');
        $post->content = $request->input('editor1');
        $post->slug = Str::slug($request->title, '-');
        $save = $post->save();

        $category->count=$category->count+1;
        $category->save();

        if ($save) {
            return back()->with('success', 'Yazı başarıyla eklendi!');
        }else {
            return back()->with('fail', 'Hata');
        }
    }

    public function show($id)
    {
        return $id;
    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {


        $request->validate([
            'title'=>'required|min:5',
            'editor2' => 'required',
        ]);

        $newcategory = Category::where('name', '=', $request->epostcategory)->first();

        $newcategory->count=$newcategory->count+1;
        $newcategory->save();

        $post = Post::where('id', '=', (int)$request->input('postid'))->first();

        $oldcategory = Category::where('id', '=', $post->categoryId)->first();

        $oldcategory->count=$oldcategory->count-1;
        $oldcategory->save();

        $post->title = $request->title;
        $post->categoryId = $newcategory->id;
        $post->adminId = session('loggedUser');
        $post->content = $request->input('editor2');
        $post->slug = Str::slug($request->title, '-');
        $save = $post->save();


        if ($save) {
            return back()->with('success', 'Yazı başarıyla güncellendi!');
        }else {
            return back()->with('fail', 'Hata');
        }

    }

    public function destroy($id)
    {
        //
    }
}
