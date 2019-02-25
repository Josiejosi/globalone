<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCompletedLevel extends Model {

    public $timestamps 	= false ;
    protected $table 	= 'user_completed_levels' ;

    protected $fillable = [

        'level',
        'is_level_started',
        'is_level_complete',
        'upgrade_count',
        'user_id',

    ] ;

}
