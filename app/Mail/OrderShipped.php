<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

      // public $contact;
      // public $email;
      // public $gender;
      // public $type;
      // public $body;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

      // $contact = $request;
      // $this->email = $email;
      // $this->gender = $gender;
      // $this->type = $type;
      // $this->body = $body;

    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('test@gmail.com')
                    ->subject('お問い合わせ確認メール')
                    ->view('emails.template')
                    ->with([
                      'email' => $contact->email,
                      'gender' => $contact->gender,
                      'type' => $contact->type,
                      'body' => $contact->body,
                    ]);
    }
}
