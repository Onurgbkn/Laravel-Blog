<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Search;
use App\Models\Owner;

class PageController extends Controller
{


    public function index(){
        $weather = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Erzurum&appid=8ebb6e4c8fccdeff707149c9fc18b696&units=metric');

        $data['weather'] = round(json_decode($weather, true)['main']['temp']);

        $data['posts']=Post::orderBy('created_at', 'DESC')->paginate(5);
        $data['categories']=Category::orderBy('count', 'DESC')->limit(3)->get();
        $data['comments']=Comment::orderBy('created_at', 'DESC')->limit(5)->where('state', 'Aktif')->get();
        return view('regular.index', $data);
    }


    public function about(){
        $weather = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Erzurum&appid=8ebb6e4c8fccdeff707149c9fc18b696&units=metric');
        $data['weather'] = round(json_decode($weather, true)['main']['temp']);

        $data['owner'] = Owner::find(1);

        $data['categories']=Category::orderBy('count', 'DESC')->limit(3)->get();
        $data['comments']=Comment::orderBy('created_at', 'DESC')->limit(5)->where('state', 'Aktif')->get();
        return view('regular.about', $data);
    }


    public function categories(){
        $weather = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Erzurum&appid=8ebb6e4c8fccdeff707149c9fc18b696&units=metric');
        $data['weather'] = round(json_decode($weather, true)['main']['temp']);

        $data['categories']=Category::orderBy('count', 'DESC')->limit(3)->get();
        $data['allcategories']=Category::orderBy('created_at', 'DESC')->get();
        $data['comments']=Comment::orderBy('created_at', 'DESC')->limit(5)->where('state', 'Aktif')->get();
        return view('regular.categories', $data);
    }


    public function categoryPosts($slug)
    {
        $weather = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Erzurum&appid=8ebb6e4c8fccdeff707149c9fc18b696&units=metric');
        $data['weather'] = round(json_decode($weather, true)['main']['temp']);

        $category = Category::where('slug', $slug)->first();
        $data['category'] = $category;
        $data['posts'] = Post::where('categoryId', $category->id)->orderBy('created_at', 'DESC')->paginate(5);
        $data['categories']=Category::orderBy('count', 'DESC')->limit(3)->get();
        $data['comments']=Comment::orderBy('created_at', 'DESC')->limit(5)->where('state', 'Aktif')->get();
        return view('regular.category', $data);
    }

    public function searchPosts(Request $request){
        $search = $request->input('search');

        $data['posts'] = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->paginate(5);

        $weather = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Erzurum&appid=8ebb6e4c8fccdeff707149c9fc18b696&units=metric');
        $data['weather'] = round(json_decode($weather, true)['main']['temp']);

        $data['categories']=Category::orderBy('count', 'DESC')->limit(3)->get();
        $data['comments']=Comment::orderBy('created_at', 'DESC')->limit(5)->where('state', 'Aktif')->get();
        // Return the search view with the resluts compacted

        $search = new Search;
        $search->text=$request->input('search');
        $search->save();

        return view('regular.search', $data);
    }


    public function post($slug)
    {
        $weather = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Erzurum&appid=8ebb6e4c8fccdeff707149c9fc18b696&units=metric');
        $data['weather'] = round(json_decode($weather, true)['main']['temp']);

        $data['categories']=Category::orderBy('count', 'DESC')->limit(3)->get();
        $post = Post::where('slug', $slug)->first();
        $data['post'] = $post;
        $data['comments']=Comment::orderBy('created_at', 'DESC')->limit(5)->where('state', 'Aktif')->get();
        $data['postcomments']=Comment::orderBy('created_at', 'DESC')->where('state', 'Aktif')->where('postId', $post->id)->paginate(5);

        return view('regular.post', $data);
    }


    public function makecomment($slug, Request $request)
    {

      $validated = $request->validate([
        'isim' => 'required',
        'email' => 'required',
        'yorum' => 'required',
      ]);

      $comment = new Comment;
      $comment->name=$request->input('isim');
      $comment->email=$request->input('email');
      $comment->text=$request->input('yorum');
      $comment->state="Pasif";
      $comment->postId=$request->input('postId');
      $comment->save();
      return redirect()->route('post', [$slug])->with('back', 'Yorumunuz ba??ar??yla g??nderildi.');
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
        'isim' => 'required',
        'email' => 'required',
        'mesaj' => 'required',
        ]);

        $contact = new Contact;
        $contact->name=$request->input('isim');
        $contact->email=$request->input('email');
        $contact->tel=$request->input('tel');
        $contact->message=$request->input('mesaj');
        $contact->state="Cevaplanmad??";
        $contact->save();
        return redirect()->route('about')->with('back', '??leti??im formu ba??ar??yla g??nderildi.');
    }
}
