<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';
    protected $fillable = [
        'id_user','address','phone','day'
    ];
    public $timestamp = false;
}
