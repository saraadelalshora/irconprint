<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Payment;
use Cart;
use Auth;
use App;
use Carbon\Carbon;
use App\Product_coupon;
use App\User_Coupon;
use App\Product;
use App\User;
use App\Country;
use App\City;
use App\Shipping_zone;
use App\Coupon;
use App\Sub_Category;
use App\Note;
use App\Order;
class ShoppingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function ShowCheckout(Request $request) {
        $cart = Cart::getContent();

        $user = Auth::User();

        $userbuyer = User::where('id', Auth::User()->id)->first();
        $Countries = Country::all();
        $city=City::find(Auth::user()->city_id);
        $shiping=$city->zones->first();
        // dd( $shiping=$city->zones->isEmpty());
        if($shiping=$city->zones->isEmpty() == true ){
            $shipping_name_en="default Zone";
            $shipping_name_ar="منطقة الشحن الافتراضية";
            $shipping_price=200;
        }
        else{
            $shipping_name_en=$city->zones->first()->name_en;
            $shipping_name_ar=$city->zones->first()->name_ar;
            $shipping_price=$city->zones->first()->price;
        }
        $payment_method=Payment::where('status','1')->get();
        $cartConditions = Cart::getConditions();
        $cartsum = Cart::getTotal();
        // dd($cartsum);
        foreach ($cartConditions as $coup) {

            $coup_type = $coup->getType();
            $coup_vallue = $coup->getValue();
        }
        // dd($cartConditions);
        

        if (Session::get('lang') == null) {
            Session::put('lang', 'ar');
        }
        if (Session::get('lang') == 'ar') {
            App::setLocale('ar');
            Carbon::setLocale('ar');
        } else {

            App::setLocale('en');
            Carbon::setLocale('en');
        }
         return view('Frontend.checkout',compact('cartConditions', 'coup_vallue', 'coup_type', 'cartsum', 'car', 'payment_method','shipping_name_en', 'userbuyer', 'Countries', 'city', 'shipping_name_ar', 'cart', 'shipping_price'));
    }

    public function CheckOut() {

        // $cart = Cart::getContent();

        // $user = Auth::User();

        // $userbuyer = User::where('id', Auth::User()->id)->first();
        // $Countries = Country::all();
        // $city=City::find(Auth::user()->city_id);
        // $shiping=$city->zones;
        
        // if($shiping=$city->zones ==null){
        //     $shipping_name_en="default Zone";
        //     $shipping_name_ar="منطقة الشحن الافتراضية";
        //     $shipping_price=200;
        // }
        // else{
        //     $shipping_name_en=$city->zones->name_en;
        //     $shipping_name_ar=$city->zones->name_ar;
        //     $shipping_price=$city->zones->price;
        // }
        // $cartConditions = Cart::getConditions();
        // $cartsum = Cart::getTotal();
        // //dd($cartConditions);
        // foreach ($cartConditions as $coup) {

        //     $coup_type = $coup->getType();
        //     $coup_vallue = $coup->getValue();
        // }
        

        // if (Session::get('lang') == null) {
        //     Session::put('lang', 'ar');
        // }
        // if (Session::get('lang') == 'ar') {
        //     App::setLocale('ar');
        //     Carbon::setLocale('ar');
        // } else {

        //     App::setLocale('en');
        //     Carbon::setLocale('en');
        // }
        // // Cart::clear(); 
        // //     Cart::clearCartConditions();
        // return view('frontend.MethodShop.checkout', compact('cuntryscript', 'coup_vallue', 'coup_type', 'cartsum', 'car', 'shipping_name_en', 'userbuyer', 'Countries', 'city', 'shipping_name_ar', 'cart', 'shipping_price'));
    }
    // this function to submit form coupoun or order
    public function postorder(Request $request)
    {
        //check which submit was clicked on
        if(Input::get('addcoupon')) {
            $this->CheckAddCopon($request); //if login then use this method
        } elseif(Input::get('saveorder')) {
            $this->AddOrder($request); //if register then use this method
        }
        // return Redirect::back();

    }  
    public function AddOrder(Request $request) {
        // dd($request->coupon,$request->all());
        // "fname" => "sara"
        // "lname" => "admin"
        // "address" => "giza fisal"
        // "country_id" => "59"
        // "city" => "938"
        // "zipcode" => null
        // "phone" => "01221292134"
        // "email" => "sara@admin.com"
        // "anotherAddress" => null
        // "anothercity" => null
        // "otherzipcode" => null
        // "otherphone" => null
        // "shipping_type" => "200"
        // "payment_type" => "2"
        // "ordernotes" => null
        // "qty" => "1"
        // $request->coupon
        if ($request->coupon) {

            $coup_discount =$request->coupon;
           
        } else {
            $coup_discount = 0;
        }
        $cart = Cart::getContent();
        // dd($cart);

        $total_cart = Cart::getTotal();
        $total = $total_cart - $coup_discount + $request->shipping_type;
        
        $cartcount = $cart->count();
        $user = Auth::user();

        $selectlastnum = DB::table('orders')->orderBy('id', 'desc')->first();

        if (!empty($selectlastnum)) {
            $randomString = $selectlastnum->code + 1;
        } else {
            $randomString = '1001';
        }

        if($request->anotherAddress ==null){
            $shipping_address=$user->address;
        }else{
            $shipping_address=$request->anotherAddress;
        }
        
        if($request->anothercountry ==null){
            $country_order=$user->country_id;
        }else{
            $country_order=$request->anothercountry;
        }
        
        if($request->anothercity == null){
            $city_order=$user->city_id;
        }else{
            $city_order=$request->anothercity;
        }

        if ($request->isMethod('post')) {
        //   try {
            $orders = new Order();
            $orders->code = $randomString;
            $orders->user_id = $user->id;
            $orders->payment_id = $request->input('payment_type');
            $orders->order_date =Carbon::now();
            $orders->shipping_address = $shipping_address;
            $orders->status ='0';

            $orders->otheraddress = $request->input('anotherAddress');
            $orders->country_id = $country_order;
            $orders->city_id = $city_order;
            $orders->other_zipcode = $request->input('otherzipcode');

            $orders->other_phone =$request->input('otherphone');
            $orders->shipping_value = $request->input('shipping_type');
            $orders->discount_value = $coup_discount;
            $orders->total_price = $total;
            // $orders->coupon_id = $cartcount;


            $orders->save();
            
           if($orders->save()){
            $prods = [];
            foreach ($cart as $value) {
                $prods['orderquantity'] = $value->quantity;
                $prods['product_id'] = $value->id;
                $prods['order_id'] = $orders->id;
                DB::table('orders_product')->insert($prods);
            }
            if($request->ordernotes){
                $user_note=new Note();
                $user_note->user_id=$user->id;
                $user_note->note_details=$request->ordernotes;
                $user_note->save();
            }
           }
            
            Cart::clear();
            Cart::clearCartConditions();
            Session::flash('success', trans('home.Yourrequesthasbeensuccessfullysent'));
            return Redirect::to('/');
        //   } catch (\Exception $ex) {
        //         Session::flash('error', trans('home.Therequestwasnotsent'));
        //         return Redirect::back()->withInput(Input::all());
        //   }
             
            if (Session::get('lang') == null) {
                Session::put('lang', 'ar');
            }
            if (Session::get('lang') == 'ar') {
                App::setLocale('ar');
                Carbon::setLocale('ar');
            } else {

                App::setLocale('en');
                Carbon::setLocale('en');
            }
        }
    }
    
    public function ActivePay($order_code){
        DB::table('oreders')
                    ->where('order_code', '=', $order_code)
                    ->update(['pay_active' => 2]);

        $typeorder = oreder::where('order_code', $order_code)->first();
        // dd($order_code);
        Cart::clear();
            Cart::clearCartConditions();
        return view('frontend.payment.index',compact('typeorder'));
    }

    public function CheckAddCopon(Request $request) {
        

     $cart = Cart::getContent();
     $user = Auth::user();
     $Countries = Country::all();
     $city=City::find(Auth::user()->city_id);
     $shiping=$city->zones->first();
     if($shiping=$city->zones->isEmpty() == true ){
            $shipping_name_en="default Zone";
            $shipping_name_ar="منطقة الشحن الافتراضية";
            $shipping_price=200;
    }
    else{
            $shipping_name_en=$city->zones->first()->name_en;
            $shipping_name_ar=$city->zones->first()->name_ar;
            $shipping_price=$city->zones->first()->price;
    }
    $payment_method=Payment::where('status','1')->get();

     $findcoupon=Coupon::where([['code',$request->coupon],['usinglimit','!=','0'],['status','1']])->get()->first();
    // dd(empty ($findcoupon));
     if(!empty ($findcoupon)){
    // dd($findcoupon);

        $copon_user =User_Coupon::where([['user_id',$user->id],['coupon_id',$findcoupon->id]])->get()->count();
        if($copon_user < $findcoupon->limit_per_user){
         $Coupon = Product_coupon::where([['coupon_id', $findcoupon->id]])->get();
         $first_product_coupon=$Coupon->first();
         if($Coupon->isEmpty() != true) 
         {
           // here we have 4 condition to check
           if ($first_product_coupon->product_id != null) {
                           $coupon_product=$Coupon->pluck('product_id');
                           foreach ($coupon_product as $item) {
                            //here check if coupon is avalibale to this product or not 
                            $couponproduct[]=$item;
            
                           }
                          foreach ($cart as $cartitem) {
                          //here check if coupon is avalibale to this product or not 
                          $productlist[]=$cartitem->id;
            
                         }
                         $result = array_intersect($couponproduct, $productlist);
                        //  dd($result,$couponproduct,$productlist);
                        if(count($result) > 0){
                                $copon_user = new User_Coupon();
                                $copon_user->coupon_id = $findcoupon->id;
                                $copon_user->user_id = $user->id;
                                $copon_user->product_ids =implode(', ', $result);
                                $copon_user->save();
                                $Coupon_update = Coupon::where('code',$request->coupon)->first();
                                $findcoupon->usinglimit = $findcoupon->usinglimit - 1;
                                $Coupon_update->save();
                                $cartprice=0;
                               
                                    // get frist value in array ----> reset($result)
                                    foreach ($result as $cartitem) {
                                        $cart_product = Cart::get(reset($result));
                                        $cartprice=$cartprice+$cart_product->price;
                                    }
                                    // $cart_product = Cart::get(reset($result));
                                    // $cartprice=$cart_product->price;
                                    
                                    if(strpos($findcoupon->value,'%') !== false){
                                        //   $findcoupon->value=;
                                        // *********** we need to check value of coupon of total price if value geater than max value applay max value /

                                         $current_coupon_value=$cartprice/$findcoupon->value;
                                         if($current_coupon_value < $findcoupon->maxvalue){
                                             $current_coupon_value=$current_coupon_value;
                                            //  dd($current_coupon_value);
                                         }else{
                                            // dd($findcoupon->maxvalue);
                                            $current_coupon_value=$findcoupon->maxvalue;
                                            // dd($current_coupon_value);

                                         }
                                    
                                     }
                                     else
                                     {
                                        // dd($findcoupon->value,"without %");
                                         if($findcoupon->value < $findcoupon->maxvalue){
                                         $current_coupon_value=$findcoupon->value;
                                        //  dd($current_coupon_value);

                                          }else{
                                         $current_coupon_value=$findcoupon->maxvalue;
                                        //  dd($current_coupon_value);

                                       
                                          }
                                     }

                                    $condition = new \Darryldecode\Cart\CartCondition(array(
                                    'name' => $findcoupon->code,
                                    'type' => 'coupon',
                                    'target' => 'total',
                                    'value' => '-'.$current_coupon_value,
                                    ));
                                    // add condition to cart 
                                    $cartConditions  = Cart::condition($condition);
                           
                                    $cConditions = Cart::getConditions();
                                 //    dd($cConditions);
                                    $cartsum= Cart::getTotal();
                                    Cart::removeCartCondition($findcoupon->code);
                                    // Session::flash('success', trans('massege.Your desco'));
                                    return view('Frontend.checkout',compact('current_coupon_value', 'coup_type', 'cartsum', 'car',
                                     'payment_method','shipping_name_en', 'Countries', 'city', 'shipping_name_ar', 'cart', 'shipping_price'))->with('success', trans('massege.Congratelation Your Coupon applied Now'));
                                 
                             
                              
                             }
                         }
                       elseif ($first_product_coupon->out_product_id) 
                       {
                        if ($first_product_coupon->out_product_id != null) {
                            $coupon_product=$Coupon->pluck('out_product_id');
                            foreach ($coupon_product as $item) {
                             //here check if coupon is avalibale to this product or not 
                             $couponproduct[]=$item;
             
                            }
                           foreach ($cart as $cartitem) {
                           //here check if coupon is avalibale to this product or not 
                           $productlist[]=$cartitem->id;
             
                          }
                          $result = array_intersect($couponproduct, $productlist);
                        //   dd($coupon_product,$result,$productlist);
                          if(count($result) > 0){
                            $copon_user = new User_Coupon();
                            $copon_user->coupon_id = $findcoupon->id;
                            $copon_user->user_id = $user->id;
                            $copon_user->product_ids =implode(', ', $result);
                            $copon_user->save();
                            $Coupon_update = Coupon::where('code',$request->coupon)->first();
                            $findcoupon->usinglimit = $findcoupon->usinglimit - 1;
                            $Coupon_update->save();
                              $deleteprice=0;
                           
                                // get frist value in array ----> reset($result)
                                foreach ($result as $cartitem) {
                                    $cart_product = Cart::get(reset($result));
                                    $deleteprice=$deleteprice+$cart_product->price;
                                }
                                $cart_total_price = Cart::getTotal();
                                $cartprice=$cart_total_price-$deleteprice;
                                
                                if(strpos($findcoupon->value,'%') !== false){
                                    //   $findcoupon->value=;
                                    // *********** we need to check value of coupon of total price if value geater than max value applay max value /

                                     $current_coupon_value=$cartprice/$findcoupon->value;
                                     if($current_coupon_value < $findcoupon->maxvalue){
                                         $current_coupon_value=$current_coupon_value;
                                        //  dd($current_coupon_value);
                                     }else{
                                        // dd($findcoupon->maxvalue);
                                        $current_coupon_value=$findcoupon->maxvalue;
                                        // dd($current_coupon_value);

                                     }
                                
                                 }
                                 else
                                 {
                                    // dd($findcoupon->value,"without %");
                                     if($findcoupon->value < $findcoupon->maxvalue){
                                     $current_coupon_value=$findcoupon->value;
                                    //  dd($current_coupon_value);

                                      }else{
                                     $current_coupon_value=$findcoupon->maxvalue;
                                    //  dd($current_coupon_value);

                                   
                                      }
                                 }

                                $condition = new \Darryldecode\Cart\CartCondition(array(
                                'name' => $findcoupon->code,
                                'type' => 'coupon',
                                'target' => 'total',
                                'value' => '-'.$current_coupon_value,
                                ));
                                // add condition to cart 
                                $cartConditions  = Cart::condition($condition);
                       
                                $cConditions = Cart::getConditions();
                             //    dd($cConditions);
                                $cartsum= Cart::getTotal();
                                Cart::removeCartCondition($findcoupon->code);
                                // Session::flash('success', trans('massege.Your desco'));
                                return view('Frontend.checkout',compact('current_coupon_value', 'coup_type', 'cartsum', 'car',
                                 'payment_method','shipping_name_en', 'Countries', 'city', 'shipping_name_ar', 'cart', 'shipping_price'))->with('success', trans('massege.Congratelation Your Coupon applied Now'));
                             
                         
                          
                         }

                        }
                       }
                       elseif($first_product_coupon->Category_id){
                        $coupon_product=$Coupon->pluck('Category_id');
                        $product_category=Product::whereIn('subcategory_id',$coupon_product)->pluck('id');
                        foreach ($product_category as $item) {
                            //here check if coupon is avalibale to this product or not 
                            $couponproduct[]=$item;
            
                           }
                          foreach ($cart as $cartitem) {
                          //here check if coupon is avalibale to this product or not 
                          $productlist[]=$cartitem->id;
            
                         }
                         $result = array_intersect($couponproduct, $productlist);
                             if(count($result) > 0){
                                $copon_user = new User_Coupon();
                                $copon_user->coupon_id = $findcoupon->id;
                                $copon_user->user_id = $user->id;
                                $copon_user->product_ids =implode(', ', $result);
                                $copon_user->save();
                                $Coupon_update = Coupon::where('code',$request->coupon)->first();
                                $findcoupon->usinglimit = $findcoupon->usinglimit - 1;
                                $Coupon_update->save();
                                $cartprice=0;
                               
                                    // get frist value in array ----> reset($result)
                                    foreach ($result as $cartitem) {
                                        $cart_product = Cart::get(reset($result));
                                        $cartprice=$cartprice+$cart_product->price;
                                    }
                                    // $cart_product = Cart::get(reset($result));
                                    // $cartprice=$cart_product->price;
                                    
                                    if(strpos($findcoupon->value,'%') !== false){
                                        //   $findcoupon->value=;
                                        // *********** we need to check value of coupon of total price if value geater than max value applay max value /

                                         $current_coupon_value=$cartprice/$findcoupon->value;
                                         if($current_coupon_value < $findcoupon->maxvalue){
                                             $current_coupon_value=$current_coupon_value;
                                            //  dd($current_coupon_value);
                                         }else{
                                            // dd($findcoupon->maxvalue);
                                            $current_coupon_value=$findcoupon->maxvalue;
                                            // dd($current_coupon_value);

                                         }
                                    
                                     }
                                     else
                                     {
                                        // dd($findcoupon->value,"without %");
                                         if($findcoupon->value < $findcoupon->maxvalue){
                                         $current_coupon_value=$findcoupon->value;
                                        //  dd($current_coupon_value);

                                          }else{
                                         $current_coupon_value=$findcoupon->maxvalue;
                                        //  dd($current_coupon_value);

                                       
                                          }
                                     }

                                    $condition = new \Darryldecode\Cart\CartCondition(array(
                                    'name' => $findcoupon->code,
                                    'type' => 'coupon',
                                    'target' => 'total',
                                    'value' => '-'.$current_coupon_value,
                                    ));
                                    // add condition to cart 
                                    $cartConditions  = Cart::condition($condition);
                           
                                    $cConditions = Cart::getConditions();
                                 //    dd($cConditions);
                                    $cartsum= Cart::getTotal();
                                    Cart::removeCartCondition($findcoupon->code);
                                    // Session::flash('success', trans('massege.Your desco'));
                                    return view('Frontend.checkout',compact('current_coupon_value', 'coup_type', 'cartsum', 'car',
                                     'payment_method','shipping_name_en', 'Countries', 'city', 'shipping_name_ar', 'cart', 'shipping_price'))->with('success', trans('massege.Congratelation Your Coupon applied Now'));
                                 
                                }
                       }
                       elseif($first_product_coupon->out_Category_id){
                        $coupon_product=$Coupon->pluck('out_Category_id');
                        $product_category=Product::whereIn('subcategory_id',$coupon_product)->pluck('id');
                        foreach ($product_category as $item) {
                            //here check if coupon is avalibale to this product or not 
                            $couponproduct[]=$item;
            
                           }
                          foreach ($cart as $cartitem) {
                          //here check if coupon is avalibale to this product or not 
                          $productlist[]=$cartitem->id;
            
                         }
                         $result = array_intersect($couponproduct, $productlist);
                         if(count($result) > 0){
                            $copon_user = new User_Coupon();
                            $copon_user->coupon_id = $findcoupon->id;
                            $copon_user->user_id = $user->id;
                            $copon_user->product_ids =implode(', ', $result);
                            $copon_user->save();
                            $Coupon_update = Coupon::where('code',$request->coupon)->first();
                            $findcoupon->usinglimit = $findcoupon->usinglimit - 1;
                            $Coupon_update->save();
                              $deleteprice=0;
                           
                                // get frist value in array ----> reset($result)
                                foreach ($result as $cartitem) {
                                    $cart_product = Cart::get(reset($result));
                                    $deleteprice=$deleteprice+$cart_product->price;
                                }
                                $cart_total_price = Cart::getTotal();
                                $cartprice=$cart_total_price-$deleteprice;
                                
                                if(strpos($findcoupon->value,'%') !== false){
                                    //   $findcoupon->value=;
                                    // *********** we need to check value of coupon of total price if value geater than max value applay max value /

                                     $current_coupon_value=$cartprice/$findcoupon->value;
                                     if($current_coupon_value < $findcoupon->maxvalue){
                                         $current_coupon_value=$current_coupon_value;
                                        //  dd($current_coupon_value);
                                     }else{
                                        // dd($findcoupon->maxvalue);
                                        $current_coupon_value=$findcoupon->maxvalue;
                                        // dd($current_coupon_value);

                                     }
                                
                                 }
                                 else
                                 {
                                    // dd($findcoupon->value,"without %");
                                     if($findcoupon->value < $findcoupon->maxvalue){
                                     $current_coupon_value=$findcoupon->value;
                                    //  dd($current_coupon_value);

                                      }else{
                                     $current_coupon_value=$findcoupon->maxvalue;
                                    //  dd($current_coupon_value);

                                   
                                      }
                                 }

                                $condition = new \Darryldecode\Cart\CartCondition(array(
                                'name' => $findcoupon->code,
                                'type' => 'coupon',
                                'target' => 'total',
                                'value' => '-'.$current_coupon_value,
                                ));
                                // add condition to cart 
                                $cartConditions  = Cart::condition($condition);
                       
                                $cConditions = Cart::getConditions();
                             //    dd($cConditions);
                                $cartsum= Cart::getTotal();
                                Cart::removeCartCondition($findcoupon->code);
                                // Session::flash('success', trans('massege.Your desco'));
                                return view('Frontend.checkout',compact('current_coupon_value', 'coup_type', 'cartsum', 'car',
                                 'payment_method','shipping_name_en', 'Countries', 'city', 'shipping_name_ar', 'cart', 'shipping_price'))->with('success', trans('massege.Congratelation Your Coupon applied Now'));
                             
                         
                          
                         }

                       }

         }
         else{
            //  here we will apply coupon on all cart product
                    foreach ($cart as $cartitem) {
                    //here check if coupon is avalibale to this product or not 
                    $productlist[]=$cartitem->id;

                    }
                    // add coupon  to user                   
                    $copon_user = new User_Coupon();
                    $copon_user->coupon_id = $findcoupon->id;
                    $copon_user->user_id = $user->id;
                    $copon_user->product_ids =implode(', ', $productlist);
                    $copon_user->save();   
                    //update using   
                    $Coupon_update=Coupon::where([['code',$request->coupon]])->get()->first();
                    $Coupon_update->usinglimit = $Coupon_update->usinglimit - 1;
                    $Coupon_update->save();  

                    if(strpos($findcoupon->value,'%') !== false){
                       //   $findcoupon->value=;
                       // *********** we need to check value of coupon of total price if value geater than max value applay max value /
                   
                        $total_price= Cart::getTotal();
                        $current_coupon_value=$total_price/$findcoupon->value;
                        if($current_coupon_value < $findcoupon->maxvalue){
                        //  dd($current_coupon_value);
                           $condition = new \Darryldecode\Cart\CartCondition(array(
                           'name' => $findcoupon->code,
                           'type' => 'coupon',
                           'target' => 'total',
                           'value' => '-'.$current_coupon_value,
                           'order' => 1,
                           ));
                           // add condition to cart 
                           $cartConditions  = Cart::condition($condition);
                           $cConditions = Cart::getConditions();
                           $cartsum= Cart::getTotal();
                           // Session::flash('success', trans('massege.Your desco'));
                           return view('Frontend.checkout',compact('current_coupon_value', 'coup_type', 'cartsum', 'car',
                            'payment_method','shipping_name_en', 'Countries', 'city', 'shipping_name_ar', 'cart', 'shipping_price'))->with('success', trans('massege.Congratelation Your Coupon applied Now'));
                           // $idpro= Cart::getTotal();
                           //  dd($cConditions,$idpro);
                        }else{
                           // dd($findcoupon->maxvalue);
                           $condition = new \Darryldecode\Cart\CartCondition(array(
                               'name' => $findcoupon->code,
                               'type' => 'coupon',
                               'target' => 'total',
                               'value' => '-'.$findcoupon->maxvalue,
                               'order' => 1,
                               ));
                               // add condition to cart 
                               $cartConditions  = Cart::condition($condition);
                               $cConditions = Cart::getConditions();
                               $cartsum= Cart::getTotal();
                            Cart::removeCartCondition($findcoupon->code);

                               return view('Frontend.checkout',compact('current_coupon_value', 'coup_type', 'cartsum', 'car',
                                'payment_method','shipping_name_en', 'Countries', 'city', 'shipping_name_ar', 'cart', 'shipping_price'))->with('success', trans('massege.Congratelation Your Coupon applied Now'));
                        }
                   
                    }
                    else
                    {
                    // dd($findcoupon->value,"without %");
                    if($findcoupon->value < $findcoupon->maxvalue){
                        //  dd($current_coupon_value);
                           $condition = new \Darryldecode\Cart\CartCondition(array(
                           'name' => $findcoupon->code,
                           'type' => 'coupon',
                           'target' => 'total',
                           'value' => '-'.$findcoupon->value,
                           'order' => 1,
                           ));
                           // add condition to cart 
                           $cartConditions  = Cart::condition($condition);
                           $cConditions = Cart::getConditions();
                           $cartsum= Cart::getTotal();
                           // Session::flash('success', trans('massege.Your desco'));
                            Cart::removeCartCondition($findcoupon->code);
                           return view('Frontend.checkout',compact('current_coupon_value', 'coup_type', 'cartsum', 'car',
                            'payment_method','shipping_name_en', 'Countries', 'city', 'shipping_name_ar', 'cart', 'shipping_price'))->with('success', trans('massege.Congratelation Your Coupon applied Now'));
                           // $idpro= Cart::getTotal();
                           //  dd($cConditions,$idpro);
                        }else{
                           // dd($findcoupon->maxvalue);
                           $condition = new \Darryldecode\Cart\CartCondition(array(
                               'name' => $findcoupon->code,
                               'type' => 'coupon',
                               'target' => 'total',
                               'value' => '-'.$findcoupon->maxvalue,
                               'order' => 1,
                               ));
                               // add condition to cart 
                               $cartConditions  = Cart::condition($condition);
                               $cConditions = Cart::getConditions();
                               $cartsum= Cart::getTotal();
                              Cart::removeCartCondition($findcoupon->code);
                               return view('Frontend.checkout',compact('current_coupon_value', 'coup_type', 'cartsum', 'car',
                                'payment_method','shipping_name_en', 'Countries', 'city', 'shipping_name_ar', 'cart', 'shipping_price'))->with('success', trans('massege.Congratelation Your Coupon applied Now'));
                        }

                    }

                    // Session::flash('error', trans('massege.You have reached the limit of using this coupon'));
                    return Redirect::back()->withInput($request->input())->withErrors('error', trans('massege.You have reached the limit of using this coupon'));
         }
        }else
        {
            // Session::flash('error', trans('massege.You have reached the limit of using this coupon'));
            return Redirect::back()->withInput($request->input())->withErrors('error', trans('massege.You have reached the limit of using this coupon'));
        }
     }
    else{
    //    Session::flash('error', trans('massege.This Coupon Not Avalible'));
    
       return Redirect::back()->withInput($request->input())->withErrors('error', trans('massege.This Coupon Not Avalible'));
    }

 }

    public function OpenOut(Request $request) {
        if ($request->ajax()) {
            $subcunt = DB::table('cities')->where('cuntry_id', $request->user_cuntry)->get();
            $data = view('frontend.MethodShop.ajax-out', compact('subcunt'))->render();
            return response()->json(['options' => $data]);
        }
    }

    public function Openplay(Request $request) {
        if ($request->ajax()) {
            $cuntryshahn = DB::table('cuntries')->where('id', $request->user_cuntry)->first();
            $data = view('frontend.MethodShop.ajax-play', compact('cuntryshahn'))->render();
            return response()->json(['text' => $data]);
        }
}
}
