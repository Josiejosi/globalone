<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
	public $timestamps = false ;

    protected $fillable = [

        'name', 
        'description', 
        'amount', 
        'upgrade_amount',
        'auto_upgrade',
        'profit',

    ] ;
}
