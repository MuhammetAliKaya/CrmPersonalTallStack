<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class CustomerDeleted extends Mailable
{
    use Queueable, SerializesModels;
    public $id;
    public $userEmail;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
        $this->userEmail = Auth::user()->email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');env('MAIL_FROM_ADDRESS'), 'CRM'
        return $this->from('malikayagenetik@gmail.com')->view('mailTemplates.customerDeleted');
    }
}