<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;

class OrderController extends Controller
{
    //


    public function ship(Request $request) {
      // $email = 'test';
      // $gender = 'Test';
      // $type = 'type';
      // $body = 'tesT';
      //  Mail::to($request->email)->send(new OrderShipped($email,$gender,$type,$body));
   //    $name = 'ララベル太郎';
   // $text = 'これからもよろしくお願いいたします。';
   // $to = 'test@gmail.com';

   // $email = $request->email;

   $request->session()->put('email', $request->input('email'));
   $request->session()->put('gender', $request->input('gender'));
   $request->session()->put('type', $request->input('type'));
   $request->session()->put('body', $request->input('body'));




   Mail::to('a@a.jp')->send(new OrderShipped());
   return    view('contacts.complete');

 }
}
