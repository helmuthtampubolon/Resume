<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profile";

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'picture',
        'destrict',
        'city',
        'region',
        'about',
        'email'
    ];
}
