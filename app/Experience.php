<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'title', 'role','start_period', 'end_period', 'description'
    ];
}
