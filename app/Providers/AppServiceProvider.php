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
use App\Product;
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
         
        $page=Page::all();
        if(isset($page)){
            View::share('page',$page);
        }
        $categories=Category::where('status','1')->take(5)->get();
        if(isset($categories)){
            View::share('categories',$categories);
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
