<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['loggedUserInfo']=Admin::where('id', '=', session('loggedUser'))->first();

        $data['posts']=Post::orderBy('created_at', 'DESC')->get();

        $data['categories']=Category::orderBy('name')->get();


        return view('admin.posts.posts', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required|min:5',
            'category'=>'required',
            'wysiwyg-editor' => 'required',
        ]);

        $category = Category::where('name', '=', $request->category)->first();



        $post = new Post;
        $post->title = $request->title;
        $post->categoryId = $category->id;
        $post->adminId = session('loggedUser');
        $post->content = $request->input('wysiwyg-editor');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
