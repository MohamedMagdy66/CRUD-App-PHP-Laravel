<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PostController extends Controller
{
    function CreatePost(Request $request){
        $incomingFields = $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id']=FacadesAuth::id();
        Post::create($incomingFields);
        return redirect('/home');
    }
    function ShowEditScreen(Post $post){
        if(FacadesAuth::user()->id !== $post['user_id']){
            return redirect('/home');
        }
        return view('edit-post',['post'=>$post]);

    }
    function saveEdit(Post $post, Request $request){
        if(FacadesAuth::user()->id !== $post['user_id']){
            return redirect('/home');
        }
        $incomingFields = $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $post->update($incomingFields);
        return redirect('/home');
    }
    function DeletePost(Post $post, Request $request){
        if(FacadesAuth::user()->id === $post['user_id']){
            $post->delete();
        }
        return redirect('/home');

    }
}
