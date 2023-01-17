<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use Illuminate\Validation\Rule;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {

        return view('admin.posts.index',[
            'posts'=> Post::paginate(10)
        ]);
    } 


    public function create() 

    {
        // if(auth()->user()?->username !== 'paolosiroko'){
        //     abort(Response::HTTP_FORBIDDEN);
        // }
        // migrated to custom admins only middleware

        return view('admin.posts.create');

    }

    public function store(StorePostRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = Auth::id();
        $data['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($data);

        return redirect('/');
    }

    public function edit(Post $post) 

    {
        return view('admin.posts.edit',['post' => $post]);

    }

    public function update(UpdatePostRequest $request,Post $post) 

    {
        $data = $request->validated();

        $post->update($data);
        
        return redirect('/admin/posts')->with('success', 'Post was updated successfully!');

    }

    public function destroy(Post $post) 

    {
        $post->delete();
        return back()->with('success', 'Post was Deleted successfully!');

    }
}
