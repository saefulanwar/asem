<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    protected $table = 'payment_status';

    protected $fillable = ['status'];
}
