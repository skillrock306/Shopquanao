<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Customer;
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
    	// $email = $request->input('email');
     //    $pass = $request->input('password');
    
    	// if(!Auth::guard('customer')->attempt(['email' => $email, 'password' => $pass]))
    	// {
 
    	// 	return redirect()->back()->with(['fail'=>'Could Not Log You In']);
    	// }

    	// return redirect()->route('frontend.homepage');
    	if(!auth()->attempt(request(['email','password']))){
			return back()->withError([
				'message' => 'The email or password is incorrect, please try again'
				]);
		}
		return view('frontend.homepage');
    }
    public function destroy()
    {
    	auth()->logout();
    	return view('frontend.homepage');
    }
    public function getRegister()
    {
    	$User = DB::table('customers')
    	->get();
    	return view('frontend.registration', compact('User'));
    }
    public function postRegister(Request $request)
    {
    	$this->validate(request(),[
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required'
    		]);
    	$user = new Customer();
    	$user->name = $request->input(['name']);
    	$user->email = $request->input(['email']);
    	$user->phone_number = $request->input(['phone_number']);
    	$user->address = $request->input(['address']);
    	$user->sex = $request->input(['sex']);
    	$user->password = Hash::make($request->input(['password']));
    	$user->date = $request->input(['date']);
    	$user->save();
    	return view('frontend.homepage');    	
    }
}
