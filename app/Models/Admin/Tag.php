<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Post;

class Tag extends Model
{
 
    protected $guarded=[];
    
    public $timestamps=false;

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }
}
