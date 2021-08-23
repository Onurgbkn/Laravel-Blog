<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Search;
use Illuminate\Support\Facades\Hash;

class Dashboard extends Controller
{
    public function index()
    {
        $data['loggedUserInfo']=Admin::where('id', '=', session('loggedUser'))->first();

        $data['posts']=Post::orderBy('created_at', 'DESC')->limit(3)->get();
        $data['comments']=Comment::orderBy('created_at', 'DESC')->limit(3)->get();
        $data['searches']=Search::orderBy('created_at', 'DESC')->limit(3)->get();

        return view('admin.dashboard', $data);
    }

    public function posts()
    {
        $data['loggedUserInfo']=Admin::where('id', '=', session('loggedUser'))->first();

        $data['posts']=Post::orderBy('created_at', 'DESC')->get();


        return view('admin.posts.posts', $data);
    }

    public function register()
    {
        return view('admin.auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'username'=>'required|unique:admins',
            'email'=>'required|email|unique:admins',
            'password' => 'required|confirmed|min:4',
        ]);

        $admin = new Admin;
        $admin->fname = $request->fname;
        $admin->lname = $request->lname;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->sifre = Hash::make($request->password);
        $admin->durum = "wait";
        $save = $admin->save();

        if ($save) {
            return back()->with('success', 'Kayıt işlemi başarıyla tamamlandı');
        }else {
            return back()->with('fail', 'Hata');
        }
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password' => 'required|min:4',
        ]);

        $adminfo = Admin::where('username', '=', $request->username)->first();
        if ($adminfo) {
            if (Hash::check($request->password, $adminfo->sifre)) {
                if ($adminfo->durum == "Pasif") {
                    return back()->with('fail', 'Hesabınız henüz onaylanmadı!');
                }else {
                    $request->session()->put('loggedUser', $adminfo->id);
                    return redirect(route('dashboard'));
                }
            }else {
                return back()->with('fail', 'Hatalı şifre girdiniz!');
            }
        }else {
            return back()->with('fail', 'Hatalı kullanıcı adı!');
        }
    }

    public function logout()
    {
        if (session()->has('loggedUser')){
            session()->pull('loggedUser');
            return redirect(route('login'));
        }
    }


    public function resetpassw()
    {
        $data['loggedUserInfo']=Admin::where('id', '=', session('loggedUser'))->first();
        return view('admin.auth.resetpassw', $data);
    }

    public function resetpasswPost(Request $request)
    {

        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed|min:4',
        ]);

        $adminfo = Admin::where('id', '=', session('loggedUser'))->first();

        if (Hash::check($request->oldpassword, $adminfo->sifre)) {
            $adminfo->sifre = Hash::make($request->password);
            $save = $adminfo->save();

            if ($save) {
                return back()->with('success', 'Şifreniz başarıyla değiştirildi!');
            }else {
                return back()->with('fail', 'Hata!');
            }
        }else {
            return back()->with('fail', 'Hatalı şifre girdiniz!');
        }
    }

    public function searches()
    {

        $data['loggedUserInfo']=Admin::where('id', '=', session('loggedUser'))->first();
        $data['searches']=Search::get();
        return view('admin.searches', $data);
    }


    public function about()
    {
        $data['loggedUserInfo']=Admin::where('id', '=', session('loggedUser'))->first();

        return view('admin.about', $data);
    }

}
