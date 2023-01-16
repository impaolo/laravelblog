<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;
use App\Http\Requests\StorePostRequest;
use Auth;


class PostController extends Controller
{
    public function index(){

        return view('posts.posts',[

             'posts' =>  Post::latest()->filter(request(['search']))

             ->paginate(5),

             'categories' => Category::all()

         ]);

    }
    
    public function show(Post $post)

     {

        return view('posts.post',[

            'post' => $post

        ]);
    }

    public function create() 

    {
        // if(auth()->user()?->username !== 'paolosiroko'){
        //     abort(Response::HTTP_FORBIDDEN);
        // }
        // migrated to custom admins only middleware

        return view('posts.create');

    }

    public function store(StorePostRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = Auth::id();
        $data['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($data);

        return redirect('/');




    }
}
