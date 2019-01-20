<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Btc extends Model
{
	public $timestamps = false ;

    protected $fillable = [

        'address',

        'user_id',

    ] ;

    public function user()  {

        return $this->belongsTo( User::class ) ;

    }
}
