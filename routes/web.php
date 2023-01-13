<?php
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[PostController::class,'index'])->name("home");

Route::get('posts/{post:slug}', [PostController::class,'show']);


Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts',[
        'posts' => $category ->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
});

Route::get('author/{author:username}', function (User $author) {

    return view('posts',[
        'posts' => $author ->posts,
        'categories' => Category::all()
    ]);
});

// Route::get('posts/{post}', function ($id) {
//     return view('post',[
//         'post' => Post::findorfail($id)
//     ]);
// });
