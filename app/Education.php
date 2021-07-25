<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'name', 'status','major', 'gpa', 'start_period','end_period'
    ];
}
