<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;

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
        Session::put('customer_id', $customer_id);
        Session::put('name', $request->name);
        Session::put('email', $request->email);

        return Redirect::to('login-check');
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
        Session::put('shipping_id', $shipping_id);

        return Redirect::to('payment');
    }

    public function payment(){
        $categorys = Categories::where('parent_id', 0)->get();

        return view('frontend.checkout.payment', compact('categorys'));
    }

    public function order_place(Request $request){
        $content = Cart::content();
        //insert payment_method
        $data = array();
        $data['payment_method'] = $request->payment_options;
        $data['payment_status'] = "Đang chờ xử lý";

        $payment_id = DB::table('payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = "Đang chờ xử lý";

        $order_id = DB::table('order')->insertGetId($order_data);

        //inser order_detail
        foreach($content as $v_content){
            $order_d_data = array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('order_detail')->insert($order_d_data);
        } 
        if( $data['payment_method'] == 1){
            echo 'Thanh toán bằng thẻ ATM';
        }else if( $data['payment_method'] == 2){
            echo 'Thanh toán bằng tiền mặt';
        }else{
            echo 'Thanh toán bằng thẻ ghi nợ';
        }
    }
    public function logout_checkout(){
        Session::flush();
        return Redirect('/login-check');
    }

    public function login_customer(Request $request){
        $eamil = $request->email;
        $password = md5($request->password);
        $result = DB::table('customer')->where('email', $eamil)->where('password',$password)->first();
        
        if($result){
            Session::put('customer_id', $result->customer_id);
            Session::put('email', $request->email);
            return Redirect::to('/home');
        }else{
            return Redirect('/login-check');
        }
    }
}
