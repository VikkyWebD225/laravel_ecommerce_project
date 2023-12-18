<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Session;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Contect;
use App\Models\Delivery;
use DataTables;




use Redirect;

use RealRashid\SweetAlert\Facades\Alert;




class HomeController extends Controller
{
    public $api;
    public function __construct($foo = null)
    {
        $this->api = new Api("rzp_test_usYc0uLA5W7ahK","ijrOVDRw7E7ScV07bTUoc0xW");

    }
    public function index()
    {
        $product = Product::paginate(3);
        $comment = Comment::orderby('id','desc')->get();
        $reply = Reply::all();
        return view('home.userpage',compact('product','comment','reply'));
    }

    public function index2()
    {
        return view('home.userpage');
    }

    public function redirect()
    {
        if(Auth::user())
        {
            return redirect('adminhome');
        }
        else
        {
            return redirect('home');
        }

        
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function contact_post(Request $request)
    {
       
            $contact = new Contect();

            $contact->username = $request->username;
            $contact->email = $request->email;
            $contact->service = $request->service;
            $contact->message = $request->message;
     
            $contact->save();
     
            return redirect()->back()->with('message','Contact Form Submitteed Successfully');
        }
       
      
    

    public function adminhome()
    {
        $total_product = Product::all()->count();
        $total_order = Order::all()->count();
        $total_customer = User::all()->count();
        $order = Order::all();

        $total_revenue=0;

        foreach($order as $order)
        {
        $total_revenue=$total_revenue + $order->price;
        }

       $total_delivered=Order::where('delivery_status','=','delivered')->get()->count();



       $total_processed=Order::where('delivery_status','=','processing')->get()->count();

        return view('admin.home',compact('total_product','total_order','total_customer','total_revenue','total_delivered','total_processed'));
    }

    public function logout()
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('home');
        }
    }

    public function product_details($id)
    {
        $product = Product::find($id);

        

        
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid = $user->id;
          $product = Product::find($id);
          $product_exist_id = Cart::where('product_id','=',$id)->where('user_id','=', $userid)->get('id')->first();

          if($product_exist_id)
          {
            $cart = Cart::find($product_exist_id)->first();
            $quantity = $cart->quantity;
            $cart->quantity = $quantity + $request->quantity;

            if($product->discount_price)
            {
              $cart->price = $product->discount_price * $cart->quantity;
            }
            else
            {
              $cart->price = $product->price * $cart->quantity;
            }

            $cart->save();

            Alert::success('Product Added Successfully','We have added product to the cart');

            session()->flash('message', 'Product added to cart successfully.');



            return redirect()->back();
          }
          else
          {
            $cart = new Cart();
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
  
            $cart->product_title = $product->title;
            
            if($product->discount_price)
            {
              $cart->price = $product->discount_price * $request->quantity;
            }
            else
            {
              $cart->price = $product->price * $request->quantity;
            }
            
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;
  
            $cart->save();
  
            return redirect()->back()->with('message','Product Added Successfully');

        }
  
  
          }
         
        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=Cart::where('user_id','=',$id)->get();
           $countries = DB::table('countries')->orderBy('name', 'asc')->get();
            return view('home.showcart',compact('cart','countries'));
        }
        else
        {
            return redirect('login');
        }
       

    }

    public function delivery_post(Request $request)
    {
        $delivery = new Delivery();

        $delivery->name = $request->name;
        $delivery->mobile = $request->mobile;
        $delivery->pincode = $request->pincode;
        $delivery->locality = $request->locality;
        $delivery->address = $request->address;
        $delivery->country = $request->countrys;
        $delivery->state = $request->states;
        $delivery->city = $request->citys;
        $delivery->landmark = $request->landmark;
        $delivery->alternatephone = $request->alternate;
        
        $delivery->save();

        return redirect()->back();

    }

   

    
  public function getState(Request $request)
  
{
    $cid = $request->input('cid');

    $state = State::where('country_id', $cid)
        ->orderBy('name', 'asc')
        ->pluck('name', 'id')
        ->toArray();

    return response()->json($state);


  }

  public function getCity(Request $request)
  {
    $sid = $request->input('sid');

    $city = City::where('state_id',$sid)
          ->orderBy('name','asc')
          ->pluck('name','id')
          ->toArray();
          
          return response()->json($city);
    
  }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        Alert::warning('Product Removed','You have Remove a  Product from the Cart');

        return redirect()->back();
    }

    public function show_order(Request $request)
    {
        // // $order::where('user_id' -> Auth()->id)->get();
        // // if($order->product_id){

        // }else{

        // }
        if(Auth::id())
        {
            
            $user = Auth::user();
            $userid = $user->id;

            $order = Order::where('user_id','=',$userid)->get();
            return view('home.showorder',compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancelled($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "You cancelled the order";
        $order->save();

        return redirect()->back();
    }
    public function cash_order()
    {
$user = Auth::user();

$userid = $user->id;

$data = Cart::where('user_id','=',$userid)->get();

foreach($data as $data)
{
    $order = new Order();

    $order->name = $data->name;
    
    $order->email = $data->email;
    
    $order->phone = $data->phone;
    
    $order->address = $data->address;
    
    $order->user_id = $data->user_id;
    
    $order->product_title = $data->product_title;
    
    $order->price = $data->price;
    
    $order->quantity = $data->quantity;
   
    $order->image = $data->image;
   
    $order->product_id = $data->product_id;

    $order->payment_status = 'cash on delivery';

    $order->delivery_status = 'processing';

    $order->save();

    $cart_id = $data->id;

    $cart = Cart::find($cart_id);

    $cart->delete();


   
}

return redirect()->back()->with('message','We Have Receive Your Order. We Will Connect With You Soon!!!');

    }

  

   

    public function add_comment(Request $request)
    {
     if(Auth::id())
     {
       $comment = new Comment();
       $comment->name = Auth::user()->name;
       $comment->user_id = Auth::user()->id;

       $comment->comment = $request->comment;

       $comment->save();

       return redirect()->back();
     }
     else
     {
        return redirect('login');
     }

    }

    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
            $reply = new Reply();

            $reply->name = Auth::user()->name;
            $reply->user_id = Auth::user()->id;
            $reply->reply = $request->reply;
            $reply->comment_id = $request->commentId;

            $reply->save();

            return redirect()->back();

        }

        else {
            return redirect('login');
        }
       
    }

    public function product_search(Request $request)
    {
        $comment = Comment::orderby('id','desc')->get();
        
        $reply = Reply::all();
        
        $search_text = $request->input('search');

        $product = Product::where('title','LIKE',"%$search_text%")->orWhere('category','LIKE',"%$search_text%")->paginate(10);

        return view('home.userpage',compact('product','comment','reply'));
    }

    public function products()
    {
        $product = Product::paginate(3);
        $comment = Comment::orderby('id','desc')->get();
        $reply = Reply::all();
        return view('home.all_product',compact('product','comment','reply'));
    }

    public function search_product(Request $request)
    {
        $comment = Comment::orderby('id','desc')->get();
        
        $reply = Reply::all();
        
        $search_text = $request->input('search');

        $product = Product::where('title','LIKE',"%$search_text%")->orWhere('category','LIKE',"%$search_text%")->paginate(10);

        return view('home.all_product',compact('product','comment','reply'));

    }

    public function razorpay($totalprice)
    {
 
        return view('home.payment',compact('totalprice'));

    }

    public function payment(Request $request,$totalprice)
    {
        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id']))
        { 
            try 
        {
            $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
        }

        catch (\Exception $e) 
        {
            return  $e->getMessage();
            \Session::put('error',$e->getMessage());
            return redirect()->back();
        }

    }
               
            
        
          
        \Session::put('success', 'Payment successful');
        return redirect('razorpay');
    }

    
}
    
       
    
  
   
       
    


