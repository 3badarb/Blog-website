<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    //

    public function ShowPostBeforeEdit(Post $post)
    {
        return view('postedit',[
            'post'=> $post,
            'categories'=>Category::all()

        ]);
    }

    public function update(Post $post)
    {
        $attributes=\request()->validate([
            'body'=>'required',
            'thumbnail'=>'image',
            'title'=>'required',
            'excert'=>'required',
            'slug'=>['required',Rule::unique('posts','slug')->ignore($post->id)],
            'category_id'=>['required',Rule::exists('categories','id')],

        ]);
        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = \request()->file("thumbnail")->store("thumbnail");
        }

        $post->update($attributes);

        return back()->with('success','updated my dear');
    }
    public function delete(Post $post)
    {
        $post->delete();
        return back();
    }
    public function AllPosts()
    {
        return view('allposts',[
            'posts'=>Post::latest()->paginate(10)
        ]);
    }
    public function index(){



        return view('hey',[
            'posts'=>Post::latest()->filter(\request(['search','category','author']))
                ->paginate(10)->withQueryString(),
            'categories'=>Category::all(),
            'currentcategory'=>Category::firstWhere('slug',\request('category'))
        ]);
    }

    public function show(Post $post){
        return view('post',[
            'post'=> $post
        ]);
    }

    public function addComment(Post $post)
    {
        \request()->validate([
            'body'=>'required'

        ]);

        $post->comments()->create([
            'body'=>\request('body'),
            'user_id'=>auth()->user()->id
        ]);
        return back();
    }

    public function createAPost()
    {
        return view('/createPost',
        ['categories'=>Category::all()]);
    }

    public function storeAPost()
    {



        $attributes=\request()->validate([
            'body'=>'required',
            'thumbnail'=>'required|image',
            'title'=>'required',
            'excert'=>'required',
            'slug'=>['required',Rule::unique('posts','slug')],
            'category_id'=>['required',Rule::exists('categories','id')],

        ]);

        $attributes['user_id']=auth()->user()->id;
        $attributes['thumbnail']=\request()->file("thumbnail")->store("thumbnail");


        Post::create($attributes);

        return redirect('/');
    }
}
