<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;
    protected $table = 'audios';

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

}
