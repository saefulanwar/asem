<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    protected $table = 'post_type';

    protected $fillable = ['title', 'slug'];

    protected $casts = ['id' => 'string'];
    
    public $incrementing = false;

    public function posts()
    {
        return $this->hasMany(Post::class,'post_type_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
