<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rates extends Model
{
    protected $table= 'rate';
    protected $fillable = [
        'id_user','id_product','star'
    ];
    public $timestamp = false;
}
