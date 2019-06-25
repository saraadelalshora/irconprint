<?php

namespace App\Http\Controllers\Front;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Training;
use App\Sub_Category;
use App\SubTwoCategory;
use App\Category;
use App\Manufactor;

class VideoController extends Controller
{
    //
    public function Video_category(Request $request)
    {
        $category=Category::where('slogen_ar',$request->slug)->orwhere('slogen_en',$request->slug)->get()->first();
        return view('Frontend.Video.category', compact('category'));
    }

    public function subcategory(Request $request)
    {
        $category=Sub_Category::where('slogen_ar',$request->slug)->orwhere('slogen_en',$request->slug)->get()->first();
        return view('Frontend.Video.subcategory', compact('category'));
    }
    public function subcategorytwo(Request $request)
    {
        $category=SubTwoCategory::where('slogen_ar',$request->slug)->orwhere('slogen_en',$request->slug)->get()->first();
        return view('Frontend.Video.subtwocategory', compact('category'));
    }


    //show Video details
    public function All_Video()
    {   
        $all_Video=Category::where([['status','1'],['type','video']])->paginate(12);
        return view('Frontend.Video.allcategory', compact('all_Video'));
    }
}
