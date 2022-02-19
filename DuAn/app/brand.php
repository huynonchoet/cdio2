<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table ='brand';
    protected $fillable = [
        'name'
    ];
    public $timestamp = false;
}
