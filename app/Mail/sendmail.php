<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        //
        $this->email=$request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fname=$this->email['fname'];
        $lname=$this->email['lname'];
        $title=$this->email['email'];
   
       
        return $this->view('email.email',compact('fname','lname','email'));
    }
}
