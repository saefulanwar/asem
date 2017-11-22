<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbstractPaper extends Model
{
    protected $table = 'abstract';

    protected $fillable = ['title','status_id','category_id','presentation_id','author_id','file'];

    protected $casts = ['id' => 'string'];
    
    public $incrementing = false;

    public function status()
    {
    	return $this->belongsTo('App\Models\PaperStatus','status_id');
    }
    public function category()
    {
    	return $this->belongsTo('App\Models\PaperStatus','category_id');
    }
    public function presentation()
    {
    	return $this->belongsTo('App\Models\Presentation','presentation_id');
    }
}
