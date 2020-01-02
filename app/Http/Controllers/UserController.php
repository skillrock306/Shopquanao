<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('guest:customer');
    }
    protected function guard()
	{
	    return Auth::guard('customer');
	}
    public function getLogin()
    {
    	$User = DB::table('customers')
    	->get();

    	return view('frontend.login', compact('User'));
    }
    public function postLogin(Request $request)
    {
    	$this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    	$email = $request->input('email');
        $pass = $request->input('password');
    
    	if(!Auth::guard('customer')->attempt(['email' => $email, 'password' => $pass]))
    	{
 
    		return redirect()->back()->with(['fail'=>'Could Not Log You In']);
    	}

    	return redirect()->route('frontend.homepage');
    }
}
