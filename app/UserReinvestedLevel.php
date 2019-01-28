<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReinvestedLevel extends Model
{
    public $timestamps 	= false ;
    protected $table 	= 'user_reinvested_levels' ;

    protected $fillable = [

        'level',
        'is_reinvested',
        'user_id',

    ] ;
}
