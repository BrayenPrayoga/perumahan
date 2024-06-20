<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RondaEmail extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * The demo object instance.
     *
     * @var Ronda
     */
    public $ronda;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ronda)
    {
        //
        $this->ronda = $ronda;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from(
            $this->ronda->senderEmail,
            $this->ronda->senderName)
            ->subject($this->ronda->subject)->to($this->ronda->email)->markdown('mails.ronda')->with([
            'message' => $this->ronda->message,
            'sender' => $this->ronda->senderName,
            'subject' => $this->ronda->subject,
        ]);     
    }
}
