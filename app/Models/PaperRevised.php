<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaperRevised extends Model
{
    protected $table = 'paper_revised';

    protected $fillable = [];

    protected $casts = ['id' => 'string'];
    
    public $incrementing = false;

    public function paper()
    {
    	return $this->belongsTo('App\Models\Paper','paper_id');
    }

    public function author()
    {
    	return $this->belongsTo('App\User','author_id');
    }
}
