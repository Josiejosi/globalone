<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $user ;
    public $order ; 

    public function __construct( $user, $order ) {
        
        $this->user             = $user ;
        $this->order            = $order ;

    }

    public function build()
    {
        return $this->markdown('emails.new.order');
    }
}
