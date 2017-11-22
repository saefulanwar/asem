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
}
