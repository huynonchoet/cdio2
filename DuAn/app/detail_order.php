<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_order extends Model
{
    protected $table = 'detail_order';
    protected $fillable = [
        'id_product','id_order','amount'
    ];
    public $timestamp = false;
}
