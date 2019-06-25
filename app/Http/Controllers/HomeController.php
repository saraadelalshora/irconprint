<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\City;
use Config;
use Session;
use App;
use App\Project;
use App\Slider;
use App\Service;
use App\Product;
use App\Manufactor;
use App\Page;
use App\NewSite;
use App\CategoryNew;
use App\Video;
use App\Training;
use App\Category;
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
        $product=Product::where('status','1')->orderBy('id', 'desc')->get()->take(8);
        $services=Service::where([['status','1']])->orderBy('id', 'desc')->get()->take(4);
        $brands=Manufactor::where('status','1')->get()->take(10);
        $about=Page::where('type','0')->get()->first();
        $projects=Project::where('status','1')->orderBy('id', 'desc')->get()->take(12);
        $videocount=Video::where('status','1')->count();
        $trainingcount=Training::where('status','1')->count();
        $productcount=$product->count();
        $projectscount=$projects->count();
        $cate_id=$product->pluck('category_id');
        
        $categories=Category::whereIn('id',$cate_id)->get();
        // dd($categories);
        $i=1;
        $x=0;
        return view('home',compact('categories','sliders','projects','product','services','about','brands','i','x','videocount','trainingcount','productcount','projectscount'));
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
