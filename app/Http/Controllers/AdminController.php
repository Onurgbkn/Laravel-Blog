<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $data['loggedUserInfo']=Admin::where('id', '=', session('loggedUser'))->first();
        $data['admins']=Admin::where('durum', '!=', 'root')->get();
        return view('admin.admins.admins', $data);
    }

    public function toggle(Request $request){
        $admin = Admin::find($request->id);
        if ($request->state == "true") {
            $admin->durum = 'Aktif';
        }else {
            $admin->durum = 'Pasif';
        }
        $admin->save();
    }

    public function delete($id)
    {
        $admin = Admin::find($id);
        $delete = $admin->delete();

        if ($delete) {
            return back()->with('success', 'Admin Listeden Çıkarıldı!');
        }else {
            return back()->with('fail', 'Hata');
        }
    }
}
