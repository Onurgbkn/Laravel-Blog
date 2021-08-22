<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Admin;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $data['loggedUserInfo']=Admin::where('id', '=', session('loggedUser'))->first();
        $data['categories']=Category::get();
        return view('admin.categories.categories', $data);
    }

    public function create(Request $request)
    {

        $request->validate([
            'name'=>'required|unique:categories',
        ]);

        $category = new Category;
        $category->name=$request->input('name');
        $category->slug=Str::slug($request->input('name'));
        $save = $category->save();

        if ($save) {
            return back()->with('success', 'Yeni kategori eklendi!');
        }else {
            return back()->with('fail', 'Hata');
        }
    }

    public function delete(Request $request)
    {


        $category = Category::find((int)$request->input('deletecategoryId'));
        $delete = $category->delete();

        if ($delete) {
            return back()->with('success', 'Kategori silindi!');
        }else {
            return back()->with('fail', 'Hata');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories',
        ]);

        $category = Category::find((int)$request->input('editcategoryId'));
        $category->name = $request->name;
        $category->slug=Str::slug($request->input('name'));
        $save = $category->save();

        if ($save) {
            return back()->with('success', 'Yeni kategori eklendi!');
        }else {
            return back()->with('fail', 'Hata');
        }
    }
}
