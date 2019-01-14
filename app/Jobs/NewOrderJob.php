<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Mail\NewOrderCreated ;

use Illuminate\Support\Facades\Mail ;

class NewOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user ;
    protected $order ;


    public function __construct( $user, $order ) {
        
        $this->user             = $user ;
        $this->order            = $order ;

    }

    public function handle() {

        Mail::to( $this->user )->send(new NewOrderCreated( $this->user, $this->order ) ) ;

    }
}
