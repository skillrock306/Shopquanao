<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Customer;
use TCG\Voyager\Models\User;
use TCG\Voyager\Models\OrderDetail;
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
    	$user = new User();
        $user->role_id = 2;
        $user->password = Hash::make($request->input('password'));
        $user->name = $request->input('nickname');
        $user->email = $request->input('account');
        $user->avatar = $request->input('avatar');
        $user->save();

    	$customer = new Customer();
    	$customer->name = $request->input('name');
    	$customer->email = $request->input('email');
    	$customer->phone_number = $request->input('phone_number');
    	$customer->address = $request->input('address');
    	$customer->sex = $request->input('sex');
    	$customer->date = $request->input('date');
    	$customer->status = 'ACTIVE';
    	$customer->save();
    	
        
        $customer->customer_id = $user->id;
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

    public function orders()
    {
    	$userId = Auth::user()->id;
    	$orders = DB::table('orders')
    	->where('customer_id',$userId)
    	->get();
    	return view('frontend.customer_order', compact('orders'));
    }
    public function orderdetail($id)
    {
    	$userId = Auth::user()->id;
    	$orders = DB::table('orders')
    	->where('customer_id',$userId)
    	->where('id',$id)
    	->first();
    	$orderdetail = DB::table('order_details AS od')
    	->leftJoin('products AS p','p.id','=','od.product_id')
    	->leftJoin('variants AS var','var.id','=','od.variant_id')
    	->leftJoin('product_images AS pi','p.id','=','pi.product_id')
    	->leftJoin('orders AS o','o.id','=','od.order_id')
    	->where('customer_id',$userId)
    	->where('od.order_id',$id)
    	->where('pi.is_default', '=', '1')
    	// ->groupby('pi.product_id')
    	->select('od.*','o.*','p.*','pi.name AS nameimg','var.*','o.status As OrderStatus','o.id')
    	->get();
    	// echo "<pre>";
    	// print_r($orderdetail); die();
    	return view('frontend.customorderdetail', compact('orderdetail','orders'));
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
