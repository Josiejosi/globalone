<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

        'order_number', 
        'amount', 
        'status', 
        'member_id', 
        'user_id',

    ] ;
}
