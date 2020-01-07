<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Customer;
use TCG\Voyager\Models\User;
use TCG\Voyager\Models\ShippingAddress;
use Auth;
use Cart;

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

    public function account()
    {
        $userId = Auth::user()->id;
        $data = DB::table('customers')
            ->where('id', $userId)
            ->first();

        return view('frontend.account', compact('data'));
    }

    public function editUser()
    {
        $userId = Auth::user()->id;
        $data = DB::table('customers')
            ->where('id', $userId)
            ->first();

        return view('frontend.edituser', compact('data'));
    }

    public function postEditUser(Request $request)
    {
        $userId = Auth::user()->id;

        $customer = Customer::find($userId);
        $customer->name = $request->input('name');
        $customer->date = $request->input('date');
        $customer->sex = $request->input('sex');
        $customer->phone_number = $request->input('phone_number');
        $customer->save();

        if ($request->input('password')) {
            $user = new User;
            $user->password = md5($request->input('password'));
            $user->save();
        }

        return redirect('/edit-user');
    }

    public function addresses()
    {
        $userId = Auth::user()->id;
        $addresses = DB::table('shipping_addresses')
            ->where('customer_id', $userId)
            ->get();

        return view('frontend.customer_address', compact('addresses'));
    }

    public function addAddress()
    {
        return view('frontend.add_address', compact('data'));
    }

    public function postAddAddress(Request $request)
    {
        $shippingAddress = new ShippingAddress;
        $shippingAddress->customer_id = Auth::user()->id;
        $shippingAddress->customer_address = $request->input('customer_address');
        $shippingAddress->is_default = $request->input('is_default');
        $shippingAddress->save();

        return redirect('/addresses');
    }

    public function editAddress($id)
    {
        $userId = Auth::user()->id;
        $data = DB::table('shipping_addresses')
            ->where('customer_id', $userId)
            ->where('id', $id)
            ->first();

        if (empty($data)) {
            return redirect('/addresses');
        }

        return view('frontend.editaddress', compact('data'));
    }

    public function postEditAddress(Request $request)
    {
        $shippingAddress = ShippingAddress::find($request->input('id'));
        $shippingAddress->customer_address = $request->input('customer_address');
        $shippingAddress->is_default = $request->input('is_default');
        $shippingAddress->save();

        return redirect('/addresses');
    }

    public function deleteAddress($id)
    {
        $userId = Auth::user()->id;
        $data = DB::table('shipping_addresses')
            ->where('customer_id', $userId)
            ->where('id', $id)
            ->delete();

        return redirect('/addresses');
    }
}
