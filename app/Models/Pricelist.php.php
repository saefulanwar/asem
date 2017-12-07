<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricelist.php extends Model
{
    protected $table = 'procelist';

    protected $casts = ['id' => 'string'];
    
    public $incrementing = false;

    protected $fillable = ['description','price','participant_type_id','show'];

    public function participant()
    {
    	return $this->belongsTo(Participant::class,'participant_type_id');
    }
}
