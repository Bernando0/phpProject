<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AudioController extends Controller
{
    public function create(Request $request){

        $pub = "C:\OpenServer\domains\audio_app\public";
//        $f_name = basename($request->audio);
//        copy($request->audio, $pub);
        $file = Storage::disk('public_uploads')->put('audios', $request->audio);
        $newAudio = new Audio();
        $newAudio->audioPath = $file;
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
        return Audio::with('genre')->find($id);
    }

    public function list(){
        $newList = Audio::with('genre')->get();
        return $newList;
    }


    //
}
