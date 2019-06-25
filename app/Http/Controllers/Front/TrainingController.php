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
use Auth;
class TrainingController extends Controller
{
    public function training_category(Request $request)
    {
        $category=Category::where('slogen_ar',$request->slug)->orwhere('slogen_en',$request->slug)->get()->first();
        return view('Frontend.training.category', compact('category'));
    }

    public function subcategory(Request $request)
    {
        $category=Sub_Category::where('slogen_ar',$request->slug)->orwhere('slogen_en',$request->slug)->get()->first();
        return view('Frontend.training.subcategory', compact('category'));
    }
    public function subcategorytwo(Request $request)
    {
        $category=SubTwoCategory::where('slogen_ar',$request->slug)->orwhere('slogen_en',$request->slug)->get()->first();
        return view('Frontend.training.subtwocategory', compact('category'));
    }


    //show training details
    public function training_details(Request $request)
    {   
        $training = Training::where('slogen_ar',$request->slug)->orwhere('slogen_en',$request->slug)->first();
      
        $all_training=Training::where('category_id',$training->category_id)->get();
        // dd($all_training);
        return view('Frontend.training.trainingdetails', compact('training','all_training'));
    }


    public function All_training()
    {   
        $all_training=Category::where([['status','1'],['type','training']])->paginate(12);
        return view('Frontend.training.allcategory', compact('all_training'));
    }
}
