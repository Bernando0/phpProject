<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Request $request){
        $newPost = new Post();
        $newPost->name = $request->name;
        $newPost->text = $request->text;
        $newPost->audio_id = $request->audio_id;
        $newPost->user_id = $request->user_id;
        $newPost->save();
        return $newPost;
    }

    public function delete($id){
        $newPost = Post::find($id);
        $newPost->delete();
    }

    public function update($id, Request $request){
        $newPost = Post::find($id);
        $newPost->name = $request->name;
        $newPost->text = $request->text;
        $newPost->audio_id = $request->audio_id;
        $newPost->save();
    }


    public function get($id){
        return Post::with('audio.genre')->find($id);
    }

    public function list(){
        return Post::all();
    }
    //
}
