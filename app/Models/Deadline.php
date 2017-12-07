<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    protected $table = 'date_setting';

    protected $fillable = ['date_of_conference','audience_registration','presenter_registration','ticket_payment','abstract_submission','fullpaper_submission',
    'abstract_payment','revised_paper'];
}
