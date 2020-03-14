<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Post;

class Category extends Model
{
    protected $table = 'category';
    
    protected $guarded=[];

    public $timestamps=false;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
