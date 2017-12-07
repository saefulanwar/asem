<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participant_type';

    protected $casts = ['id' => 'string'];
    
    public $incrementing = false;

    protected $fillable = ['name','description'];
}
