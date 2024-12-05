<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

Route::get('/', function () {
    return view('welcome');
});
Route::get(uri:'/home',action:function(){
    //
    $posts=[];
    if(FacadesAuth::check()){
        //getting posts using user prespective
        //$posts = FacadesAuth::user()->UserPosts->latest()->get();
        //getting posts using posts table prespective
        $posts = Post::where('user_id',FacadesAuth::id())->get();
    }
    else{$posts = Post::all();}
    return view('home',['posts'=>$posts]);
});
Route::post(uri: '/register', action: UserController::class . "@Register");
Route::post(uri: '/Logout', action: UserController::class . "@Logout");
Route::post(uri: '/Login', action: UserController::class . "@Login");
Route::post(uri: '/CreatePost', action: PostController::class . "@CreatePost");
Route::get(uri:'/edit-post/{post}',action:PostController::class.'@ShowEditScreen');
Route::put(uri:'/edit-post/{post}',action:PostController::class.'@saveEdit');
Route::delete(uri:'/delete-post/{post}',action:PostController::class.'@DeletePost');

