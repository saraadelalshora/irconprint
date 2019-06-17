<?php

namespace App\Http\Controllers\Admin;
use Intervention\Image\ImageManagerStatic as Image;
use App\Ad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ads=Ad::all()->first();
        // dd($all_ads);
        return view('Admin.ads.ads',compact('ads'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        // dd($request->all());
        // $ads=new Ad;
        // if ($request->hasFile('img1')) {
        //     $file = $request->file('img1');
        //     $imageExtension = $file->getClientOriginalExtension();
        //     $imageName ='img1_'.time().'.'.$imageExtension;
        //     if (!file_exists('public/ads/larg/')) {
        //         mkdir('public/ads/larg/', 0777, true);
        //     }
        //     if (!file_exists('public/ads/small/')) {
        //         mkdir('public/ads/small/', 0777, true);
        //     }
        //     $image_resize = Image::make($file->getRealPath());
        //     $image_resize->resize(170, 110);
        //     $image_resize->save(public_path('ads/larg/' .$imageName));
        //     $image_resize1 = Image::make($file->getRealPath());
        //     $image_resize1->resize(150, 150);
        //     $image_resize1->save(public_path('ads/small/' .$imageName));
        //    // $manufactor->image = $request->img;
        //     $ads->img1='ads/larg/'.$imageName;
            
        // }
        // // $ads->img1=$request->img1;
        // $ads->link1=$request->link1;
        // $ads->description1=$request->description1;
        // $ads->status1=$request->status1;
        // if ($request->hasFile('img2')) {
        //     $file = $request->file('img2');
        //     $imageExtension = $file->getClientOriginalExtension();
        //     $imageName ='img2_'.time().'.'.$imageExtension;
        //     if (!file_exists('public/ads/larg/')) {
        //         mkdir('public/ads/larg/', 0777, true);
        //     }
        //     if (!file_exists('public/ads/small/')) {
        //         mkdir('public/ads/small/', 0777, true);
        //     }
        //     $image_resize = Image::make($file->getRealPath());
        //     $image_resize->resize(170, 110);
        //     $image_resize->save(public_path('ads/larg/' .$imageName));
        //     $image_resize1 = Image::make($file->getRealPath());
        //     $image_resize1->resize(150, 150);
        //     $image_resize1->save(public_path('ads/small/' .$imageName));
        //    // $manufactor->image = $request->img;
        //     $ads->img2='ads/larg/'.$imageName;
            
        // }
        // // $ads->img2=$request->img2;

        // $ads->link2=$request->link2;
        // $ads->description2=$request->description2;
        // $ads->status2=$request->status2;
        // // $ads->img3=$request->img3;
        // if ($request->hasFile('img3')) {
        //     $file = $request->file('img3');
        //     $imageExtension = $file->getClientOriginalExtension();
        //     $imageName ='img3_'.time().'.'.$imageExtension;
        //     if (!file_exists('public/ads/larg/')) {
        //         mkdir('public/ads/larg/', 0777, true);
        //     }
        //     if (!file_exists('public/ads/small/')) {
        //         mkdir('public/ads/small/', 0777, true);
        //     }
        //     $image_resize = Image::make($file->getRealPath());
        //     $image_resize->resize(170, 110);
        //     $image_resize->save(public_path('ads/larg/' .$imageName));
        //     $image_resize1 = Image::make($file->getRealPath());
        //     $image_resize1->resize(150, 150);
        //     $image_resize1->save(public_path('ads/small/' .$imageName));
        //    // $manufactor->image = $request->img;
        //     $ads->img3='ads/larg/'.$imageName;
            
        // }
        // $ads->link3=$request->link3;
        // $ads->description3=$request->description3;
        // $ads->status3=$request->status3;
        // if ($request->hasFile('img4')) {
        //     $file = $request->file('img4');
        //     $imageExtension = $file->getClientOriginalExtension();
        //     $imageName ='img4_'.time().'.'.$imageExtension;
        //     if (!file_exists('public/ads/larg/')) {
        //         mkdir('public/ads/larg/', 0777, true);
        //     }
        //     if (!file_exists('public/ads/small/')) {
        //         mkdir('public/ads/small/', 0777, true);
        //     }
        //     $image_resize = Image::make($file->getRealPath());
        //     $image_resize->resize(170, 110);
        //     $image_resize->save(public_path('ads/larg/' .$imageName));
        //     $image_resize1 = Image::make($file->getRealPath());
        //     $image_resize1->resize(150, 150);
        //     $image_resize1->save(public_path('ads/small/' .$imageName));
        //    // $manufactor->image = $request->img;
        //     $ads->img4='ads/larg/'.$imageName;
            
        // }
        // $ads->link4=$request->link4;
        // $ads->description4=$request->description4;
        // $ads->status4=$request->status4;
        // if ($request->hasFile('img5')) {
        //     $file = $request->file('img5');
        //     $imageExtension = $file->getClientOriginalExtension();
        //     $imageName ='img5_'.time().'.'.$imageExtension;
        //     if (!file_exists('public/ads/larg/')) {
        //         mkdir('public/ads/larg/', 0777, true);
        //     }
        //     if (!file_exists('public/ads/small/')) {
        //         mkdir('public/ads/small/', 0777, true);
        //     }
        //     $image_resize = Image::make($file->getRealPath());
        //     $image_resize->resize(170, 110);
        //     $image_resize->save(public_path('ads/larg/' .$imageName));
        //     $image_resize1 = Image::make($file->getRealPath());
        //     $image_resize1->resize(150, 150);
        //     $image_resize1->save(public_path('ads/small/' .$imageName));
        //    // $manufactor->image = $request->img;
        //     $ads->img5='ads/larg/'.$imageName;
            
        // }
        // // $ads->img5=$request->img5;
        // $ads->link5=$request->link5;
        // $ads->description5=$request->description5;
        // $ads->status5=$request->status5;
        // $ads->save();
        // return redirect('Ads')->with('success','تم اضافة الاعلانات بنجاح');
    
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
       
            'img1'=>'mimes:jpeg,jpg,png,gif|max:10000'
        ],[
          
            'img.mimes' => ' هذه الصورة غير مقبولة برجاء اختيار صورة  ',

        ]);
          $ads=Ad::find($id);
        if ($request->hasFile('img1')) {
            $file = $request->file('img1');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='img1_'.time().'.'.$imageExtension;
            if (!file_exists('public/ads/larg/')) {
                mkdir('public/ads/larg/', 0777, true);
            }
            if (!file_exists('public/ads/small/')) {
                mkdir('public/ads/small/', 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(270, 427);
            $image_resize->save(public_path('ads/larg/' .$imageName));
            $image_resize1 = Image::make($file->getRealPath());
            $image_resize1->resize(150, 150);
            $image_resize1->save(public_path('ads/small/' .$imageName));
           // $manufactor->image = $request->img;
            $ads->img1='ads/larg/'.$imageName;
            
        }
        // $ads->img1=$request->img1;
        $ads->link1=$request->link1;
        $ads->description1=$request->description1;
        $ads->status1=$request->status1;
        if ($request->hasFile('img2')) {
            $file = $request->file('img2');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='img2_'.time().'.'.$imageExtension;
            if (!file_exists('public/ads/larg/')) {
                mkdir('public/ads/larg/', 0777, true);
            }
            if (!file_exists('public/ads/small/')) {
                mkdir('public/ads/small/', 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(370, 220);
            $image_resize->save(public_path('ads/larg/' .$imageName));
            $image_resize1 = Image::make($file->getRealPath());
            $image_resize1->resize(150, 150);
            $image_resize1->save(public_path('ads/small/' .$imageName));
           // $manufactor->image = $request->img;
            $ads->img2='ads/larg/'.$imageName;
            
        }
        // $ads->img2=$request->img2;

        $ads->link2=$request->link2;
        $ads->description2=$request->description2;
        $ads->status2=$request->status2;
        // $ads->img3=$request->img3;
        if ($request->hasFile('img3')) {
            $file = $request->file('img3');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='img3_'.time().'.'.$imageExtension;
            if (!file_exists('public/ads/larg/')) {
                mkdir('public/ads/larg/', 0777, true);
            }
            if (!file_exists('public/ads/small/')) {
                mkdir('public/ads/small/', 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(370, 220);
            $image_resize->save(public_path('ads/larg/' .$imageName));
            $image_resize1 = Image::make($file->getRealPath());
            $image_resize1->resize(150, 150);
            $image_resize1->save(public_path('ads/small/' .$imageName));
           // $manufactor->image = $request->img;
            $ads->img3='ads/larg/'.$imageName;
            
        }
        $ads->link3=$request->link3;
        $ads->description3=$request->description3;
        $ads->status3=$request->status3;
        if ($request->hasFile('img4')) {
            $file = $request->file('img4');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='img4_'.time().'.'.$imageExtension;
            if (!file_exists('public/ads/larg/')) {
                mkdir('public/ads/larg/', 0777, true);
            }
            if (!file_exists('public/ads/small/')) {
                mkdir('public/ads/small/', 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(370, 220);
            $image_resize->save(public_path('ads/larg/' .$imageName));
            $image_resize1 = Image::make($file->getRealPath());
            $image_resize1->resize(150, 150);
            $image_resize1->save(public_path('ads/small/' .$imageName));
           // $manufactor->image = $request->img;
            $ads->img4='ads/larg/'.$imageName;
            
        }
        $ads->link4=$request->link4;
        $ads->description4=$request->description4;
        $ads->status4=$request->status4;
        if ($request->hasFile('img5')) {
            $file = $request->file('img5');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='img5_'.time().'.'.$imageExtension;
            if (!file_exists('public/ads/larg/')) {
                mkdir('public/ads/larg/', 0777, true);
            }
            if (!file_exists('public/ads/small/')) {
                mkdir('public/ads/small/', 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(1170, 220);
            $image_resize->save(public_path('ads/larg/' .$imageName));
            $image_resize1 = Image::make($file->getRealPath());
            $image_resize1->resize(370, 220);
            $image_resize1->save(public_path('ads/small/' .$imageName));
           // $manufactor->image = $request->img;
            $ads->img5='ads/larg/'.$imageName;
            
        }
        // $ads->img5=$request->img5;
        $ads->link5=$request->link5;
        $ads->description5=$request->description5;
        $ads->status5=$request->status5;
        $ads->save();
        return redirect('admin/Ads')->with('success','تم اضافة الاعلانات بنجاح');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
