<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $data['loggedUserInfo'] = Admin::where('id', '=', session('loggedUser'))->first();
        $data['contacts1'] = Contact::where('state', 'Cevaplanmadı')->get();
        $data['contacts2'] = Contact::where('state', 'Cevaplandı')->get();

        return view('admin.contacts.contacts', $data);
    }

    public function answer(Request $request)
    {
        $request->validate([
            'editor2'=>'required|min:10',
        ]);

        $contact = Contact::find($request->contactId);
        $contact->adminId = session('loggedUser');
        $contact->answer = $request->input('editor2');
        $contact->state = "Cevaplandı";
        $save = $contact->save();

        if ($save) {
            return back()->with('success', 'Mesaj Cevaplandı!');
        }else {
            return back()->with('fail', 'Hata');
        }
    }
}
