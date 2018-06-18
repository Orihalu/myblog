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
      // public $body
      public $data;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
      $this->data = $data;



      // $contact = $request;
      // $contact->email = $email;
      // $contact->gender = $gender;
      // $contact->type = $type;
      // $contact->body = $body;




    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('testss@gmail.com')
                    ->subject('お問い合わせ確認メール')
                    ->view('emails.template')
                    ->with([
                      'email' => $this->data->email,
                      'gender' => $this->data->gender,
                      'type' => $this->data->type,
                      'body' => $this->data->body,
                    ]);
    }
}
