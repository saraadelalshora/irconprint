<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Product;
use App\Sub_Category;
use App\Manufactor;
use App\Filter;
use App\Comment;
use App\Wishlist;
use App\Order_product;
use Auth;
class productController extends Controller
{
    //

public function index()
    {
        $products = Product::where('status','1')->orderBy('created_at', 'desc')->paginate(12);;
 
        return view('Frontend.product', compact('products'));
    }
    public function product_category(Request $request)
    {
        $subcategory=Sub_Category::where('slogen_ar',$request->slug)->orwhere('slogen_en',$request->slug)->get()->first();
        // dd($subcategory);
        $products = Product::where([['status','1'],['subcategory_id',$subcategory->id]])->orderBy('created_at', 'desc')->paginate(12);
       $manufactors=Manufactor::where('status','1')->get();
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

       //  $lastproducts = Product::where([['status','1'],['subcategory_id',$subcategory->id]])->orderBy('created_at', 'desc')->paginate(12);
        return view('Frontend.product', compact('products','subcategory','manufactors','bestsellerproduct'));
    }
    public function product_filters(Request $request)
    {
        // this function get filter(sub of sub category) and retraive product 
        $filter=Filter::where('name_ar',$request->slug)->orwhere('name_en',$request->slug)->get()->first();
        // dd($filter);
        $products = Product::where([['status','1'],['filter_id',$filter->id]])->orderBy('created_at', 'desc')->paginate(12);
       $manufactors=Manufactor::where('status','1')->get();
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

       //  $lastproducts = Product::where([['status','1'],['subcategory_id',$filter->id]])->orderBy('created_at', 'desc')->paginate(12);
        return view('Frontend.filtersubproduct', compact('products','filter','manufactors','subcategory','bestsellerproduct'));

    }

    //show product details
    public function product_details(Request $request)
    {   
        $product = Product::where('slogen_ar',$request->slug)->orwhere('slogen_en',$request->slug)->first();
        $rate=Comment::where([['product_id',$product->id],['approved','1']])->avg('rate');
        // dd($rate);
        $related_product=Product::where([['status','1'],['subcategory_id',$product->subcategory->id]])->orderBy('created_at', 'desc')->paginate(12);
        return view('Frontend.productdetails', compact('product','related_product','rate'));
    }


    // for submmit comment 
    public function comment(Request $request){
        // dd($request->all());
        // 'product_id','user_id', 'rate','comment'
        $comment=new Comment;
        $comment->product_id=$request->product;
        $comment->user_id=Auth::user()->id;
        $comment->rate=$request->rating;
        $comment->comment=$request->comment;    
        $comment->save();
        if($comment->save()){
            Session::flash('success', trans('home.Yourrequesthasbeensuccessfullysent'));
            return Redirect::back();
        }
      
    }

    //wishlist
    public function wishlist(Request $request){
        $wishlist=new Wishlist;
        $wishlist->product_id=$request->product;
        $wishlist->user_id=Auth::user()->id;
        $wishlist->save();
        if($wishlist->save()){
            Session::flash('success', trans('home.Yourrequesthasbeensuccessfullysent'));
            return back();
        }
    }
    //show wishlist 
    public function Show_wishlist(){
        $wishlists=Wishlist::where('user_id',Auth::user()->id)->get();
        $sum=0;
        foreach($wishlists as $wish){
          $sum=+$wish->product->price;
        }
        // dd($sum);
        return view('Frontend.wishlist', compact('wishlists','sum'));
    }
    //
    public function filter(){
        // $product = new Product();
        // $html = $product->searchProducts($_POST);
        // $data = array(
        // "html" => $html,
        // );
        // return json_encode($data);

    }
}
