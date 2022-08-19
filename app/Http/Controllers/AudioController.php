<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function create(Request $request){
        $newAudio = new Audio();
        $newAudio->audioPath = $request->audioPath;
        $newAudio->tempo = $request->tempo;
        $newAudio->genre_id = $request->genre_id;
        $newAudio->post_id = $request->post_id;
        $newAudio->save();
        return $newAudio;
    }

    public function delete($id){
        $newAudio = Audio::find($id);
        $newAudio->delete();
    }

    public function update($id, Request $request){
        $newAudio = Audio::find($id);
        $newAudio->audioPath = $request->audioPath;
        $newAudio->tempo = $request->tempo;
        $newAudio->genre_id = $request->genre_id;
        $newAudio->post_id = $request->post_id;
        $newAudio->save();
    }

    public function get($id){
        return Audio::with('genre', 'post')->find($id);
    }

    public function list(){
        $newList = Audio::all();
        return $newList;
    }


    //
}
