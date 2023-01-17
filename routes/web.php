<?php
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminPostController;
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
Route::post('posts/{post:slug}/comments', [PostCommentsController::class,'store']);


Route::get('admin/posts', [AdminPostController::class,'index'])->middleware('admins');
Route::get('admin/posts/create', [AdminPostController::class,'create'])->middleware('admins');
Route::post('admin/posts', [AdminPostController::class,'store'])->middleware('admins');

Route::get('admin/posts/{post}/edit', [AdminPostController::class,'edit']);
Route::put('admin/posts/{post}', [AdminPostController::class,'update']);
Route::delete('admin/posts/{post}', [AdminPostController::class,'destroy']);




Route::get('register', [RegisterController::class ,'create'])->middleware('guest');
Route::post('register', [RegisterController::class ,'store'])->middleware('guest');

Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('login',[SessionsController::class,'store'])->middleware('guest');

Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');


Route::post('newsletter', function () {
    request()->validate(['email'=>'required|email']);

       $mailchimp = new MailchimpMarketing\ApiClient();

       $mailchimp->setConfig([
       'apiKey' => config('services.mailchimp.key'),
       'server' => 'us21'
       ]);
       $list_id = "7cec9841a2";
try {
       $response = $mailchimp->lists->addListMember($list_id, [
           "email_address" => request("email"),
           "status" => "subscribed"
         ]);
   } catch(\exception $e){
       throw \Illuminate\Validation\ValidationException::withMessages([
           'email' => 'This email could not be added'
       ]);

   }
       
       return redirect('/')->with('success','You are now subscribed to our newsletters!');

});















// Route::get('posts/{post}', function ($id) {
//     return view('post',[
//         'post' => Post::findorfail($id)
//     ]);
// });

