<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use  App\Http\Controllers\Admin;

class HomeController extends Controller
{
    //
    public function __construct() {
      $this->middleware('auth:admin');
    }


    public function index() {
      // dd(Auth::user());
      // dd(Auth::user()->role);
      return 'OKOKOK';
    }
}
