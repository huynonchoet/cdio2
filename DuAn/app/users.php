<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'users';
    protected $fillable= [
        'name','email','password','phone','address','country','avatar','level'
    ];

    public $timestamp = false;
}
