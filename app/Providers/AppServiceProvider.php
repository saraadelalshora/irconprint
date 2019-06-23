<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Setting;
use App\SocialMedia;
use App\Page;
use Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Auth;
use App;
use Carbon\Carbon;
use App\Service;
use App\Wishlist;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        Schema::defaultStringLength(191);
        $social=SocialMedia::all()->first();
        if(isset($social)){
            View::share('social',$social);
        }

        $setting=Setting::all()->first();
         if(isset($setting)){
          View::share('setting',$setting); 
         }
         
         $page=Page::where('status','1')->get();
        if(isset($page)){
            View::share('page',$page);
        }
        $secure_page=Page::where([['status','1'],['type','3']])->take(3)->get();
        if(isset($secure_page)){
            View::share('secure_page',$secure_page);
        }
        $services=Service::where([['status','1']])->take(3)->get();
        if(isset($services)){
            View::share('services',$services);
        }
        $eshop_page=Page::where([['status','1'],['type','2']])->get()->first();
        if(isset($eshop_page)){
            View::share('eshop_page',$eshop_page);
        }
        $product_categories=Category::where([['status','1'],['type','product']])->take(5)->get();
        if(isset($product_categories)){
            View::share('product_categories',$product_categories);
        }
        $video_categories=Category::where([['status','1'],['type','video']])->take(5)->get();
        if(isset($video_categories)){
            View::share('video_categories',$video_categories);
        }
        $training_categories=Category::where([['status','1'],['type','training']])->take(5)->get();
        if(isset($training_categories)){
            View::share('training_categories',$training_categories);
        }

       
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
