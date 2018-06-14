<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //ggg
use App\Contact;     //class not foundが出るため
use Illuminate\Support\Facades\Auth;


/*
*/
class ContactsController extends Controller
{
    public function index() {
      // $types = Contacts::$types;
      // $genders = Contacts::$genders;
      if (Auth::check()) {

      return view('contacts.index');
    }
      else {
        return redirect('/login');
      }
      // ->with([
      //   'types' => $types,
      //   'gender' => $genders
      // ]);
    }

    public function confirm(Request $request) {
      // $contact = new Contact();
      //
      // $contact->email = $request->email;
      // $contact->gender = $request->gender;
      // $contact->type = $request->type;
      // $contact->body = $request->body;
      // $contact->save();

      // var_dump($request->all());
      $this->validate($request, [
        'email' => 'required|email',
        'gender' => 'required',
        'type' => 'required',
        'body' => 'required',
      ]);



      // post値をsessionへ格納
      $request->session()->put('email', $request->input('email'));
      $request->session()->put('gender', $request->input('gender'));
      $request->session()->put('type', $request->input('type'));
      $request->session()->put('body', $request->input('body'));


      return view('contacts.confirm')
      ->with([
        'email' => $request->session()->get('email'),
        'gender' => $request->session()->get('gender'),
        'type' => $request->session()->get('type'),
        'body' => $request->session()->get('body'),

      ]);


      // return view('contacts.confirm')->with('contact', $contact);

    }

    public function complete(Request $request) {

      if ($request->get('action') == 'back') {
        return redirect()
        ->route('contacts.index');
                // ->withInput($request->except(['action', 'confirming']));
      }


      $request->session()->regenerateToken();
//sessionからデータの取り出し↓
      // var_dump($request->session()->get('email'));
      // var_dump($request->session()->get('gender'));
      // var_dump($request->session()->get('type'));
      // var_dump($request->session()->get('body'));

// モデルが取得したオブジェクトに情報を与えてsaveで保存
      $contact = new Contact;
      // var_dump('$contact');
      $contact->email = $request->session()->get('email');
      $contact->gender = $request->session()->get('gender');
      $contact->type = $request->session()->get('type');
      $contact->body = $request->session()->get('body');
      $contact->save();




      // $contact = new Contact();
      //
      // $contact->email = $request->email;
      // $contact->gender = $request->gender;
      // $contact->type = $request->type;
      // $contact->body = $request->body;
      //
      // $contact->save();
      return view('contacts.complete');

    }
}
