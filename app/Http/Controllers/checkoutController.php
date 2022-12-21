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
    public function login_checkout()
    {
        $categorys = Categories::where('parent_id', 0)->get();

        return view('frontend.checkout.login-check', compact('categorys'));
    }

    public function add_customer(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = md5($request->password);
        $phone = $request->phone;

        $countEmail = DB::Table("customer")->where("customer_email", "=", $email)->Count();
        if ($countEmail == 0) {
            $customer_id = DB::table('customer')->insertGetId(['customer_name' => $name, 'customer_email' => $email, 'password' => $password, 'customer_phone' => $phone]);
            Session::put('customer_id', $customer_id);
            Session::put('customer_name', $request->name);
            Session::put('customeremail', $request->email);

            return Redirect::to('login-check');
        }else{
            return redirect(url("login-check?notify=emailExists"));
        }
    }

    public function checkout()
    {
        $categorys = Categories::where('parent_id', 0)->get();
        return view('frontend.checkout.checkout', compact('categorys'));
    }
    public function save_checkout_customer(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $phone = $request->phone;
        $note = $request->note;

        $shipping_id = DB::table('shipping')->insertGetId(['name' => $name, 'email' => $email, 'address' => $address, 'phone' => $phone, 'Note' => $note]);
        Session::put('shipping_id', $shipping_id);

        return Redirect::to('payment');
    }

    public function payment()
    {
        $categorys = Categories::where('parent_id', 0)->get();

        return view('frontend.checkout.payment', compact('categorys'));
    }

    public function order_place(Request $request)
    {
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
        $order_data['Date'] = now();
        $order_data['order_status'] = "Đang chờ xử lý";

        $order_id = DB::table('order')->insertGetId($order_data);

        //inser order_detail
        foreach ($content as $v_content) {
            $order_d_data = array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('order_detail')->insert($order_d_data);
        }
        if ($data['payment_method'] == 1) {
            echo 'Thanh toán bằng thẻ ATM';
        } else if ($data['payment_method'] == 2) {
            Cart::destroy();
            $categorys = Categories::where('parent_id', 0)->get();

            return view('frontend.checkout.handcash', compact('categorys'));
        } else {
            echo 'Thanh toán bằng thẻ ghi nợ';
        }
    }
    public function logout_checkout()
    {
        Session::flush();
        return Redirect('/login-check');
    }

    public function login_customer(Request $request)
    {
        $eamil = $request->email;
        $password = md5($request->password);
        $result = DB::table('customer')->where('customer_email', $eamil)->where('password', $password)->first();

        if ($result) {
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_email', $request->email);
            return Redirect::to('/home');
        } else {
            return Redirect('/login-check');
        }
    }

    public function manage_order()
    {

        $all_order = DB::table('order')
            ->join('customer', 'order.customer_id', '=', 'customer.customer_id')
            ->select('order.*', 'customer.customer_name')
            ->orderBy('order.order_id', 'asc')->get();
        $manage_order = view('admin.order.manage_order', compact('all_order'));
        return view('admin.layout.layoutAdmin')->with('admin.order.manage_order', $manage_order);
    }

    public function view_order($orderID)
    {
        $order_by_idd = DB::table('customer')->first();
        $order_by_id = DB::table('order')
            ->join('customer', 'order.customer_id', '=', 'customer.customer_id')
            ->join('shipping', 'order.shipping_id', '=', 'shipping.shipping_id')
            ->join('order_detail', 'order.order_id', '=', 'order_detail.order_id')
            ->select('order.*', 'customer.*', 'shipping.*', 'order_detail.*')->first();
        $manage_order_by_id = view('admin.order.view_order', compact('order_by_id','order_by_idd'));
        return view('admin.layout.layoutAdmin')->with('admin.order.view_order', $manage_order_by_id);
    }

    public function delivery($orderId)
    {
        $all_order = DB::table('order')
            ->join('customer', 'order.customer_id', '=', 'customer.customer_id')
            ->select('order.*', 'customer.customer_name')
            ->orderBy('order.order_id', 'asc')->get();
        $status = "Đã giao hàng";
        DB::table('order')->where('order_id', '=', $orderId)->update(['order_status' => $status]);

        return view('admin.order.manage_order', compact('all_order'));
    }
}
