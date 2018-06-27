<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class AdminContactsController extends Controller
{
    //

    public function __construct() {
      $this->middleware('auth:admin');
    }




    public function index() {

      $contacts = Contact::all();

      return view('admin.contact',['contacts'=>$contacts]);
    }


    public function show(Contact $contact) {
      return view('admin.contact', ['contact' => $contact]);
    }
}
