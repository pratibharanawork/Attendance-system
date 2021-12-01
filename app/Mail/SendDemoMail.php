<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendDemoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'pratibhademo@gmai.com';
        $subject = 'This is a demo!';
        $name = 'Pratibha Doe';
        return $this->from($address, $name)
            ->subject($subject)
            ->cc($address, $name)
            ->bcc($address, $name)
            ->replyTo($address, $name)
            ->view('email-temp')
            ->with(
              [
                    'testVarOne' => '1',
                    'testVarTwo' => '2',
              ]);
              // ->attach(public_path('/images').'/demo.jpg', [
              //         'as' => 'demo.jpg',
              //         'mime' => 'image/jpeg',
              // ])
            
    }
}