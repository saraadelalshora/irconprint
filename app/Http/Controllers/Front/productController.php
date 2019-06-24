<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Product;
use App\Sub_Category;
use App\SubTwoCategory;
use App\Category;
use App\Manufactor;
use App\Filter;
use App\Comment;
use App\Wishlist;
use App\Order_product;
use Auth;
class productController extends Controller
{
    //subcategory

    public function index()
    {
        $products = Product::where('status','1')->orderBy('created_at', 'desc')->paginate(12);;
 
        return view('Frontend.product', compact('products'));
    }

    public function product_category(Request $request)
    {
        $category=Category::where('slogen_ar',$request->slug)->orwhere('slogen_en',$request->slug)->get()->first();
        return view('Frontend.product.category', compact('category'));
    }

    public function subcategory(Request $request)
    {
        $category=Sub_Category::where('slogen_ar',$request->slug)->orwhere('slogen_en',$request->slug)->get()->first();
        return view('Frontend.product.subcategory', compact('category'));
    }
    public function subcategorytwo(Request $request)
    {
        $category=SubTwoCategory::where('slogen_ar',$request->slug)->orwhere('slogen_en',$request->slug)->get()->first();
        return view('Frontend.product.subtwocategory', compact('category'));
    }


    //show product details
    public function product_details(Request $request)
    {   
        $product = Product::where('slogen_ar',$request->slug)->orwhere('slogen_en',$request->slug)->first();
        return view('Frontend.product.productdetails', compact('product'));
    }


 
}
