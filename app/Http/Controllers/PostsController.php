<?php

namespace App\Http\Controllers;
use App\Posts;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Posts::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
    	$data= request()->validate([
    		'caption'=> 'required',
    		'image' => 'required|image',
    	]);

    	$imagePath= request('image')->store('uploads','public');
        
    	$image = Image::make(public_path("storage/{$imagePath}"))->fit(600, 600);
    	$image->save();

    	auth()->user()->posts()->create([
    		'caption'=> $data['caption'],
    		'image' => $imagePath,
    	]);

        return redirect('/profile/'.auth()->user()->id);
    }

    public function show(Posts $post)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($post->user->id) : false;
        return view('posts.show', compact('post','follows'));
    }
}
