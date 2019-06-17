<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\City;
use Config;
use Session;
use App;
use App\Category;
use App\Slider;
use App\Ad;
use App\Product;
use App\Manufactor;
use App\Order_product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::where('status','1')->get();
        $ads=Ad::all()->first();
        $product=Product::where('status','1')->get();
        // $subcategories=Sub_Category::where('status','1')->get()->random(6);;
        $subcategories=Category::where('status','1')->get()->take(6);
        $lastproduct=Product::where('status','1')->orderBy('created_at', 'desc')->get()->take(10);
        $specialproduct=Product::where([['status','1'],['special','1']])->orderBy('created_at', 'desc')->get();
        $brands=Manufactor::where('status','1')->get()->take(10);
        $orderproduc=Order_product::latest()->get();
        if($orderproduc->isEmpty() == true){
          if($product->count() >= 6){
               $bestsellerproduct=Product::where('status','1')->orderBy('created_at', 'desc')->get()->random(6);
            }
          else{
            $bestsellerproduct=Product::where('status','1')->get()->take(10);
            }
        }
        else{
        if($orderproduc->count() >= 6){
          $order_product=$orderproduc->pluck('product_id');
          $bestsellerproduct= Product::whereIn('id', $order_product)->get()->unique('id'); 
          $bestsellerproduct=$bestsellerproduct->random(6);
         }else{
          $order_product=$orderproduc->pluck('product_id');
           $bestsellerproduct= Product::whereIn('id', $order_product)->get()->unique('id'); 
          $bestsellerproduct=$bestsellerproduct->take(10);
         }
        }

        return view('home',compact('sliders','ads','subcategories','lastproduct','specialproduct','brands','bestsellerproduct'));
    }
   
    public function search(){
        $q = Input::get ( 'keyword' );
        $subcategory=Input::get ( 'category' );
        if($subcategory =='all'){
          $products = Product::where([['name_ar','LIKE','%'.$q.'%']])->orWhere([['name_en','LIKE','%'.$q.'%']])->paginate(12);
    
        }else{
          $products = Product::where([['name_ar','LIKE','%'.$q.'%'],['subcategory_id',$subcategory]])->orWhere([['name_en','LIKE','%'.$q.'%'],['subcategory_id',$subcategory]])->paginate(12);
    
        }
       
        if(count($products) > 0)
        {
          // dd($products);
          return view('Frontend.search',compact('products'));
        } 
        else 
        return view ('Frontend.search')->withMessage('No Details found. Try to search again !');
    }
    public function set_lang($locale)
    {
        if (in_array($locale, Config::get('app.languages'))) {
            Session::put('locale', $locale);
          }
          return redirect()->back();
    }
}
