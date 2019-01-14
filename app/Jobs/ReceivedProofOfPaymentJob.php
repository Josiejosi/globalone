<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Mail\SendPOP ;

use Illuminate\Support\Facades\Mail ;

class ReceivedProofOfPaymentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user ;

    public function __construct( $user ) {
        
        $this->user         = $user ;

    }

    public function handle() {

        Mail::to( $this->user )->send(new SendPOP() ) ;
        \Log::info( $this->user ) ;

    }
}
