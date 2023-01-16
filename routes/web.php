<?php
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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
    $post = Post::all();
    return view('posts.post',[
        'posts' => $category ->posts,
        'post' => $post,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
});

Route::get('author/{author:username}', function (User $author) {
    $post = Post::all();
    return view('posts.post',[
        'posts' => $author ->posts,
        'post' => $post,
        'categories' => Category::all()
    ]);
});



Route::get('admin/posts/create', [PostController::class,'create'])->middleware('admins');
Route::post('admin/posts', [PostController::class,'store'])->middleware('admins');





Route::get('register', [RegisterController::class ,'create'])->middleware('guest');
Route::post('register', [RegisterController::class ,'store'])->middleware('guest');

Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('login',[SessionsController::class,'store'])->middleware('guest');

Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');


















// Route::get('posts/{post}', function ($id) {
//     return view('post',[
//         'post' => Post::findorfail($id)
//     ]);
// });

