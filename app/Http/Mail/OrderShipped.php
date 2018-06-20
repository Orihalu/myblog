<?php

namespace App\Http\Mail;

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
      public $contact;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
// dd($contact);
      $this->contact = $contact;



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
                      'email' => $this->contact->email,
                      'gender' => $this->contact->gender,
                      'type' => $this->contact->type,
                      'body' => $this->contact->body,
                    ]);
    }
}
