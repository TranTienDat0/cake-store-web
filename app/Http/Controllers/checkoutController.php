<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Redirect;

session_start();

class checkoutController extends Controller
{
    //
    public function login_checkout(){
        $categorys = Categories::where('parent_id', 0)->get();

        return view('frontend.checkout.login-check', compact('categorys'));
    }

    public function add_customer(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password = md5($request->password);
        $phone = $request->phone;

        $customer_id = DB::table('customer')->insertGetId(['name'=>$name, 'email'=>$email, 'password'=>$password, 'phone'=>$phone]);
        Session::put('id', $customer_id);
        Session::put('name', $request->name);
        Session::put('email', $request->email);

        return Redirect::to('checkout');
    }

    public function checkout(){
        $categorys = Categories::where('parent_id', 0)->get();
        return view('frontend.checkout.checkout', compact('categorys'));
    }
    public function save_checkout_customer(Request $request){
        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $phone = $request->phone;
        $note = $request->note;

        $shipping_id = DB::table('shipping')->insertGetId(['name'=>$name, 'email'=>$email, 'address'=>$address, 'phone'=>$phone, 'Note'=>$note]);
        Session::put('id', $shipping_id);

        return Redirect::to('payment');
    }

    public function payment(){

    }
}
