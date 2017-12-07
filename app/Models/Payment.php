<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $fillable = ['payment_status_id','payment_proof'];

    protected $casts = ['id' => 'string'];
    
    public $incrementing = false;

    public function participant()
    {
    	return $this->belongsTo('App\User','user_id');
    }
    
    public function scopeIspending($query){
        return $query->where('payment_status_id','=', '2');
    }
    
    public function status() {
        return $this->belongsTo('App\Models\PaymentStatus','payment_status_id');
    }
    
    public function dateFormatted($showTimes = false){
        $format = "d/m/Y";
        if ($showTimes) $format = $format . " H:i:s";
        return $this->created_at->format($format);
    }
    
    public function scopeFilterstatus($query,$val=""){
        if(empty($val)) return $query;
        return $query->where("payment_status_id",$val);
    }
    
}
