<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;

use Auth;


class PostController extends Controller
{
    public function index(){
        $post = Post::all();

        return view('posts.index',[

             'posts' =>  Post::latest()->filter(request(['search', 'category' ,'author']))->paginate(6),
             'post' => $post
             

    

         ]);

    }
    
    public function show(Post $post)

     {
        return view('posts.show',[

            'post' => $post

        ]);
    }
}
