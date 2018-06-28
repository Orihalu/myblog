<?php

namespace App\Http\Controllers;

use App\Http\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact;
use App\Http\Controllers\Controller;


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
      return view('admin.showcontact', ['contact' => $contact]);
    }
}
