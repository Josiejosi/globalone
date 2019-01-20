<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upliner extends Model
{
	public $timestamps = false ;

    protected $fillable = [

        'user_id',
        'upliner_id',

    ] ;
}
