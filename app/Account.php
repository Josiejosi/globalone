<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {

	public $timestamps = false ;

    protected $fillable = [

        'bank_name', 
        'account_holder', 
        'account_number', 
        'account_type',

        'user_id',

    ] ;

}
