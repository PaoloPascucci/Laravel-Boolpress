<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'sub_title', 'cover','body'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    
}
