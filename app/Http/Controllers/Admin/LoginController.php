<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Middleware\AdminAuth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';//管理者ログイン成功後のジャンプ先

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
      // dd(Auth::check());

        return view('admin.login');//管理者ログインのテンプレート
    }

    // public function getAdminLogin() {
    //   if (Auth::guard('admin')->user()) {
    //     return redirect('/admin/home');
    //   }
    //   return view('/admin/login');
    // }

    // protected function guard()
    // {
    //     return Auth::guard('admin');//管理者認証のguardを指定
    // }

    public function login(Request $request) {
      $this->validate($request,[
        'email' => 'required|email',
        'password' => 'required|min:6'
      ]);
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
      {
        return redirect()->intended(route('admin.dashboard'));
      }
        return redirect()->back()->withInput($request->only('email', 'remember'));
      }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect('/admin/login');
    }
}
