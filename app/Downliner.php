<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Downliner extends Model
{
	public $timestamps = false ;

    protected $fillable = [

        'user_id',
        'downliner_id',

    ] ;
}
