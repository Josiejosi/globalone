<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountActivated extends Mailable
{
    use Queueable, SerializesModels;

    public $user ;
    public $url ; 

    public function __construct( $user ) {
        
        $this->user         = $user ;
        $this->url          = url( '/' ) ;

    }

    public function build() {

        return $this->markdown('emails.account.activated') ;

    }
}
