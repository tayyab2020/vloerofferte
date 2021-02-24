<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:user', ['except' => ['logout']]);
    }

 	public function showLoginForm()
    {
      return view('user.login');
    }

    public function login(Request $request)
    {


      // Validate the form data

		$this->validate($request,[
		    'email' => 'required|email',
		    'password' => 'required',
		]);

      // Attempt to log the user in
      if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'allowed' => 1])) {

        if( Auth::guard('user')->user()->role_id == 2)
        {

          // if successful, then redirect to their intended location
        return redirect()->intended(route('user-dashboard'));

        }
        else
        {

          // if successful, then redirect to their intended location
        return redirect()->intended(route('client-quotation-requests'));

        }


      }

      // if unsuccessful, then redirect back to the login with the form data
      Session::flash('message',"f");
      return redirect()->back()->withInput($request->only('email'));
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect('/');
    }
}
