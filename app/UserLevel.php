<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
	public $timestamps = false ;

    protected $fillable = [

        'level_id', 
        'user_id',

    ] ;
}
