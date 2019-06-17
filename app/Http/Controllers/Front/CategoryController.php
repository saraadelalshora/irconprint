<?php

namespace App\Http\Controllers\Front;
use App\Category;
use App\Sub_Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function subcategorylist($id){

    $maincategory=Category::where('slogen_ar',$id)->orwhere('slogen_en',$id)->get()->first();
     $subcategorylist=Sub_Category::where([['category_id',$maincategory->id],['status','1']])->orderBy('created_at', 'desc')->get();
     return view('Frontend.subcategoryList',compact('subcategorylist','maincategory'));
    }
}
