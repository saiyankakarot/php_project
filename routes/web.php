<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController; 
use App\Models\Post;

   // Route::get('/',[App\http\Controllers\UserController::class, 'index'])->name('index');
   



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

 Route::get('/', function () {
   $posts = Post::where('user_id', auth()->id())->get();  //all() method fetches all the posts from the database
    
 // $posts = auth()->user()->Coolposts()->latest()->get();
  return view('sahil', ['posts'=> $posts]);
 });

    Route::POST('/register',[UserController::class,'register']);
    Route::post('/logout', [UserController::class,'logout']);
     Route::post('/login', [UserController::class,'login']);
      
     //Blog Posts related routes
     Route::post('/create-post', [PostController::class, 'createPost']);
     Route::get('/edit-post/{post}',[PostController::class, 'showEditScreen']);
     Route::put('/edit-post/{post}',[PostController::class, 'actuallyUpdatePost']); //Edit post from sbumit
     Route::delete('/delete-post/{post}',[PostController::class, 'deletePost']);
     


//    Route::POST('/register', function(){
//     return "form submitted";
//    });
