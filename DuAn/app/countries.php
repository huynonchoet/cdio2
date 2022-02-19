<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    protected $table ='country';
    protected $fillable = [
        'id','name'
    ];
    public $timestamp = false;
}
