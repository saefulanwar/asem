<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model {

    protected $table = 'papers';
    protected $fillable = ['title', 'status_id', 'category_id', 'presentation_id', 'author_id', 'paper_review_id', 'file'];
    protected $casts = ['id' => 'string'];
    public $incrementing = false;

    public function status() {
        return $this->belongsTo('App\Models\PaperStatus', 'status_id');
    }

    public function category() {
        return $this->belongsTo('App\Models\PaperStatus', 'category_id');
    }

    public function presentation() {
        return $this->belongsTo('App\Models\Presentation', 'presentation_id');
    }

    public function dateFormatted($showTimes = false) {
        $format = "d/m/Y";
        if ($showTimes)
            $format = $format . " H:i:s";
        return $this->created_at->format($format);
    }

    public function scopeFilterstatus($query, $val = "") {
        if (empty($val))
            return $query;
        return $query->where("status_id", $val);
    }
    
    public function participant()
    {
    	return $this->belongsTo('App\User','author_id');
    }

}
