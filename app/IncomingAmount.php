<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomingAmount extends Model {

    protected $fillable = [

        'amount',
        'status',
        'receiver_id',
        'sender_id',

    ] ;
    
}
