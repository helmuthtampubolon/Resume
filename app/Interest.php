<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $table = "interest";

    protected $fillable = [
        'description'
    ];
}
