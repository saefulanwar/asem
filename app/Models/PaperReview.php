<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaperReview extends Model {

    protected $table = 'paper_review';
    protected $fillable = ['sugestion', 'paper_id', 'reviewer_id', 'paper_revision_file'];
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
