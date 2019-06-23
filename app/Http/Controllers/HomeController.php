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
use App\NewSite;
use App\CategoryNew;
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
        $specialproduct=Product::where([['status','1']])->orderBy('created_at', 'desc')->get();
        $brands=Manufactor::where('status','1')->get()->take(10);
        
        return view('home',compact('sliders','ads','subcategories','lastproduct','specialproduct','brands'));
    }
   
    public function search(){
        $q = Input::get ( 'keyword' );
         $newscategories=CategoryNew::where('status','1')->get();
          $news = NewSite::where([['title_ar','LIKE','%'.$q.'%']])->orWhere([['title_en','LIKE','%'.$q.'%']])->paginate(12);
          
         return view('Frontend.newslist', compact('news','newscategories'));
        
    }
    public function set_lang($locale)
    {
        if (in_array($locale, Config::get('app.languages'))) {
            Session::put('locale', $locale);
          }
          return redirect()->back();
    }
}
