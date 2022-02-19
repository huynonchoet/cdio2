<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'name','image','price','id_user','brand','category','sale','profile','detail'
    ];
    public $timestamp = false;
}
