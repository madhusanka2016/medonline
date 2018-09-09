<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //Common

    public function orderinvoice(Request $request)
    {
        dd($request);
        $order = $request->input('order');
        $orderdes = DB::select("select * from orders where id='" . $order . "' ");
        $details = DB::select("select * from cart where orderid='" . $order . "' ");


        //dd($Jobid);
        $pdf = PDF::loadView('partials.invoiceorder', array('Jobid' => $order, 'order' => $orderdes, 'details' => $details));
        //dd($pdf);
        return $pdf->download($order . '.pdf');

    }
//USers Parts
    public function indexid($id)
    {
        $details = DB::select("SELECT * FROM users where email='" . $id . "'");

        return view('profile', ['details' => $details]);
    }
    public function index()
    {
        return view('profilelog');
    }
    public function shoppingcart($id)
    {
        $cart = DB::select("SELECT * FROM cart where user='" . $id . "' AND state='cart' ");
        $order = DB::select("SELECT orderid FROM orders ");
        //dd($order);
        $payment = DB::select("SELECT * FROM payment where user='" . $id . "'");

        $total=0;
        return view('user.cart', ['id' => $id , 'total' => $total , 'cart' => $cart, 'order' => $order,  'payment' => $payment]);

    }
    public function deletecart(Request $request)
    {
        //dd($request);
        $id = $request->input('item');
        $user = $request->input('user');
        DB::table('cart')
            ->where('id',$id)
            ->delete();

        return redirect('/shoppingcart/'.$user.'');


    }
    public function userorder($id)
    {
        $orders = DB::select("SELECT * FROM orders where user='" . $id . "'");

        return view('user.order', ['id' => $id, 'orders' => $orders ]);



    }
    public function mypayments($id)
    {
        $payment = DB::select("SELECT * FROM payment where user='" . $id . "'");
        // $items= 5;
        return view('user.payment', ['payment' => $payment]);

    }
    public function myprescriptions($id)
    {
        $pres = DB::select("SELECT * FROM prec where user='" . $id . "'");
        return view('user.prescription', ['pres' => $pres]);
    }
    public function addpresc(Request $request)
    {
        //dd($request);
        $topic = $request->input('topic');
        $desc = $request->input('desc');
        $link = $request->input('link');
        $payment = $request->input('payment');
        $repeat = $request->input('repeat');
        $state = $request->input('state');
        $user = $request->input('user');
        DB::table('prec')
            ->Insert(['user' => $user,'topic' => $topic,  'desc' => $desc , 'link' => $link, 'payment' => $payment, 'repeat' => $repeat, 'state' => $state]);
        $pres = DB::select("SELECT * FROM prec where user='" . $user . "'");
        return redirect('/myprescriptions/'.$user.'');

    }
    public function addtocart(Request $request)
    {
        //dd($request);
        $name = $request->input('name');
        $id = $request->input('id');
        $price = $request->input('price');
        $qty = $request->input('qty');
        $user = $request->input('user');
        $cat = $request->input('cat');
        $state = $request->input('state');


        DB::table('cart')
            ->Insert(['i_name' => $name,  'user' => $user ,  'i_id' => $id,  'i_qty' => $qty,    'i_price' => $price ,    'state' => $state]);

        $proArr = ["Prescription Medicine", "Diabetes", "Home Medicine", "First Aid", "Mother & Baby", "Wellness", "Personal Care", "Skin Care", "Health Care", "Pet Care", "Supplements"];
        $catArr = ["Prescription Medicine" => 1 , "Diabetes" => 2, "Home Medicine" => 3, "First Aid" => 4, "Mother & Baby" => 5, "Wellness" =>6 , "Personal Care" => 7, "Skin Care" => 8 , "Health Care" => 9, "Pet Care" => 10 , "Supplements" => 11];

        if (in_array($cat, $proArr)) {
            $catno = $catArr[$cat];
            $items = DB::select("SELECT * FROM item where i_cat='" . $catno . "'");
            $Title=$cat;

            // $items= 5;

            return view('product', ['items' => $items,'Title' => $Title,'catnum' => $catno  ]);

        }

    }
    public function addpayment(Request $request)
    {
        dd($request);
        $owner = $request->input('owner');
        $type = $request->input('type');
        $card = $request->input('card');

        $user = $request->input('user');
        $exp = $request->input('exp');

        DB::table('payment')
            ->Insert(['user' => $user,  'type' => $type ,  'card' => $card,  'owner' => $owner,    'exp' => $exp]);
        return redirect('/mypayments/'.$user.'');

    }
    public function purchase(Request $request)
    {
        //dd($request);
        $pay = $request->input('pay');
        $order = $request->input('order');
        $price = $request->input('price');
        $user = $request->input('user');
        $state = $request->input('state');
        $oldstate = 'cart';
        $newstate = 'order';
        DB::table('orders')
            ->Insert(['user' => $user,'orderid' => $order,'price' => $price,'state' => $state,'payid' => $pay]);
        DB::table('cart')
            ->where(['user' => $user,'state' => $oldstate])
            ->update(['orderid' => $order, 'state' => $newstate]);
        $orders = DB::select("SELECT * FROM orders where user='" . $user . "'");

        return view('user.order', ['id' => $user, 'orders' => $orders ]);

    }
    public function vieworderuser($id)
    {
        $details = DB::select("SELECT * FROM cart where orderid ='" . $id . "'");
        $orders = DB::select("SELECT * FROM orders where orderid='" . $id . "'");


        return view('user.vieworder', ['orders' => $orders, 'details' => $details]);
    }




    //Admin part
    public function admin()
    {
        $orders = DB::select("SELECT * FROM orders ORDER BY id DESC LIMIT 5");
        $items = DB::select("SELECT * FROM item  ORDER BY i_qty ASC LIMIT 5");
        return view('admin.index', ['items' => $items ,'orders' => $orders]);
    }
    public function additems()
    {
        return view('admin.add');
    }
    public function items()
    {
            $items = DB::select("SELECT * FROM item ");
            // $items= 5;
            return view('admin.items', ['items' => $items]);
    }
    public function recent()
    {
        $orders = DB::select("SELECT * FROM orders ");

        return view('admin.recent', ['orders' => $orders ]);

    }
    public function backup()
    {
        return view('admin.backup');
    }
    public function additemdb(Request $request)
    {
        //dd($request);
        $name = $request->input('name');
        $cat = $request->input('cat');
        $brand = $request->input('brand');
        $desc = $request->input('desc');
        $price = $request->input('price');
        $qty = $request->input('qty');
        $img = $request->input('img');
        DB::table('item')
            ->Insert(['i_name' => $name,  'i_cat' => $cat ,  'i_brand' => $brand, 'i_des' => $desc, 'i_qty' => $qty,    'i_price' => $price,  'i_img' => $img]);
        return view('admin.add');

    }
    public function addqty(Request $request)
    {
       // dd($request);

        $qty = $request->input('qty');
        $stock = $request->input('stock');
        $id = $request->input('item');
        $newstock=$qty+$stock;
        DB::table('item')
            ->where(['id' => $id])
            ->update([ 'i_qty' => $newstock]);
        return redirect('/items/');

    }
    public function changeitem(Request $request)
    {
        //dd($request);
        $name = $request->input('name');
        $id = $request->input('id');
        $cat = $request->input('cat');
        $brand = $request->input('brand');
        $desc = $request->input('desc');
        $price = $request->input('price');
        $qty = $request->input('qty');
        $img = $request->input('img');
        DB::table('item')
            ->where(['id' => $id])
            ->update(['i_name' => $name,  'i_cat' => $cat ,  'i_brand' => $brand, 'i_des' => $desc, 'i_qty' => $qty,    'i_price' => $price,  'i_img' => $img]);
        return redirect('/items/');

    }
    public function deleteitem(Request $request)
    {
        //dd($request);

        $id = $request->input('item');

        DB::table('item')
            ->where('id',$id)
            ->delete();       return redirect('/items/');

    }










    //Cashier Part

    public function cashier()
    {
        $orders = DB::select("SELECT * FROM orders ORDER BY id DESC LIMIT 5");
        $items = DB::select("SELECT * FROM item  ORDER BY i_qty ASC LIMIT 5");
        return view('cashier.index', ['items' => $items ,'orders' => $orders]);
    }
    public function uporders()
    {
        $orders = DB::select("SELECT * FROM orders where state='Processing'");

        return view('cashier.uporders', ['orders' => $orders ]);

    }
    public function uppres()
    {
        $pres = DB::select("SELECT * FROM prec WHERE state = 'Processing'");
        return view('cashier.uppres', ['pres' => $pres]);

    }
    public function viewpres($id)
    {
        $pres = DB::select("SELECT * FROM prec where id ='" . $id . "'");
        $med = DB::select("SELECT * FROM item where i_cat ='1'");
        $bucket = DB::select("SELECT * FROM precitem where orderid ='" . $id . "'");

        return view('cashier.viewpres', ['pres' => $pres, 'med' => $med, 'id' => $id,'bucket' => $bucket ]);
    }
    public function cusorder()
    {
        return view('cashier.customorder');
    }
    public function addtopresc(Request $request)
    {
        //dd($request);
        $orderid = $request->input('orderid');
        $i_id = $request->input('i_id');
        $name = $request->input('name');

        $user = $request->input('user');
        $qty = $request->input('qty');
        $price = $request->input('price');
        DB::table('precitem')
            ->Insert(['user' => $user,  'orderid' => $orderid ,  'i_id' => $i_id,  'i_name' => $name,    'i_qty' => $qty,    'i_price' => $price]);
        $pres = DB::select("SELECT * FROM prec where id ='" . $orderid . "'");
        $med = DB::select("SELECT * FROM item where i_cat ='1'");
        $bucket = DB::select("SELECT * FROM precitem where orderid ='" . $orderid . "'");

        return view('cashier.viewpres', ['pres' => $pres, 'med' => $med, 'id' => $orderid ,'bucket' => $bucket ]);
    }
    public function processprec(Request $request)
    {
      //dd($request);

        $order = $request->input('order');
        $price = $request->input('price');

        $state = $request->input('state');
        ;

        DB::table('prec')
            ->where(['id' => $order])
            ->update(['price' => $price, 'state' => $state]);


        return redirect('/uppres');

    }
    public function processorder(Request $request)
    {
        //dd($request);

        $order = $request->input('order');


        $state = $request->input('state');
        ;

        DB::table('orders')
            ->where(['id' => $order])
            ->update([ 'state' => $state]);


        return redirect('/uporders');

    }
}
